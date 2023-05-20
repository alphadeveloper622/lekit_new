<?php

namespace App\Http\Controllers\Seller\Addons;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminResource\PosOfflineMethodResource;
use App\Repositories\Admin\Addon\PackageRepository;
use App\Repositories\Admin\Addon\SellerSubscriptionRepository;
use App\Repositories\Interfaces\Admin\Addon\OfflineMethodInterface;
use App\Repositories\Interfaces\Admin\Addon\WalletInterface;
use App\Repositories\Interfaces\Admin\AddonInterface;
use App\Repositories\Interfaces\Admin\CurrencyInterface;
use App\Traits\ImageTrait;
use App\Traits\PaymentTrait;
use App\Utility\AppSettingUtility;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    protected $sellerPackage,$sellerSubscription;

    use PaymentTrait,ImageTrait;

    public function __construct(PackageRepository $sellerPackage, SellerSubscriptionRepository $sellerSubscription)
    {
        $this->sellerPackage        = $sellerPackage;
        $this->sellerSubscription   = $sellerSubscription;
    }
    public function index()
    {
        try {
            $data = [
                'packages'          => $this->sellerPackage->paginate(get_pagination('index_form_paginate'),1),
                'active_package'    => authUser()->subscription,
            ];
            return view('admin.seller_packages.index', $data);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back();
        }
    }

    protected function subscriptionSettle($package,$data,$wallet): bool
    {
        $subscription   = authUser()->subscription;
        $user           = authUser();
        $adjustable         = settingHelper('subscription_method');
        $refund_amount      = 0;

        if ($subscription) {
            $subscription_package = $subscription->package;

            if ($user->active_subscription && $adjustable == 1 && $subscription_package)
            {
                $remaining_days = Carbon::parse($subscription->expires_at)->diffInDays(now());

                $per_day_charge = $subscription_package->price / $subscription_package->duration;

                $refund_amount = $per_day_charge * $remaining_days;
            }
            $subscription->update([
                'status' => 0
            ]);
        }

        if ($adjustable == 1 && $refund_amount > 0 && $subscription && $package->id != $subscription->seller_package_id) {
            $wallet->store([
                'user_id'           => authId(),
                'amount'            => $refund_amount,
                'source'            => 'package_subscription_refund',
                'type'              => 'income',
                'payment_method'    => $data['payment_type'],
                'payment_details'   => [],
                'status'            => 'approved',
                'transaction_id'    => $data['trx_id'],
            ]);
            authUser()->update([
                'balance' => authUser()->balance + $refund_amount
            ]);
        }
        return true;
    }
    public function payment($id,CurrencyInterface $currency, OfflineMethodInterface $offlineMethod,AddonInterface $addon)
    {
        try {
            $package        = $this->sellerPackage->find($id);
            $subscription   = authUser()->subscription;

            if ($package->is_free == 1) {
                if ($subscription && $package->id == $subscription->seller_package_id) {
                    $this->sellerSubscription->update([
                        'status'                => 1,
                        'product_upload_limit'  => $package->product_upload_limit,
                        'expires_at'            => Carbon::parse($subscription->expires_at)->addDays($package->duration),
                    ], $subscription->id);
                }
                else{
                    $row = [
                        'user_id'               => authId(),
                        'seller_package_id'     => $package->id,
                        'payment_method'        => 'offline_method',
                        'offline_method_id'     => null,
                        'offline_method_file'   => null,
                        'amount'                => $package->price,
                        'purchase_at'           => now(),
                        'expires_at'            => now()->addDays($package->duration),
                        'trx_id'                => Str::random(),
                        'payment_details'       => [],
                        'product_upload_limit'  => $package->product_upload_limit,
                        'status'                => 1,
                    ];
                    $this->sellerSubscription->store($row);
                }
                Toastr::success(__('package_purchased_successfully'));

                return back();
            }

            $ngn_exchange_rate = 1;
            $is_paystack_activated = settingHelper('is_paystack_activated') == 1;
            $ngn = AppSettingUtility::currencies()->where('code', 'NGN')->first();
            if ($ngn):
                $ngn_exchange_rate = $ngn->exchange_rate;
            else:
                $is_paystack_activated = 0;
            endif;
            $default_currency = AppSettingUtility::currencies()->where('id', settingHelper('default_currency'))->first();
            $data = [
                'package' => $package,
                'currency' => $default_currency ? $default_currency->code : 'USD',
                'indian_currency' => $currency->currencyByCode('INR'),
                'offline_methods' => addon_is_activated('offline_payment') ? PosOfflineMethodResource::collection($offlineMethod->activeMethods()) : [],
                'jazz_data' => $this->jazzCashPayment(),
                'jazz_url' => config('jazz_cash.TRANSACTION_POST_URL'),
                'addons' => $addon->activePlugin(),
                'trx_id' => Str::random(),
                'amount' => $package->price,
                'ngn_exchange_rate' => $ngn_exchange_rate,
                'paystack_activated' => $is_paystack_activated,
                'fw_activated' => settingHelper('is_flutterwave_activated') == 1,
                'default_assets' => [
                    'preloader' => static_asset('images/default/preloader.gif'),
                    'review_image' => static_asset('images/others/env.svg'),
                ]
            ];
            return view('seller.packages.payment', $data);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back();
        }
    }
    public function completePurchase(Request $request, OfflineMethodInterface $offline,WalletInterface $wallet)
    {
        try {
            if ($request->STATUS == 'TXN_FAILURE')
            {
                $url = route("seller.packages");
                Toastr::error($request->RESPMSG);

                return redirect($url);
            }

            $package            = $this->sellerPackage->find($request->package_id);
            $subscription       = authUser()->subscription;
            $data               = $request->all();
            $data['image']      = [];
            $payment_details    = $this->methodCheck($data);
            $status             = $this->successStatusCheck($data, $payment_details);

            if (!$status) {
                return back();
            }

            $status = 1;
            $storage = settingHelper('default_storage') == 'aws_s3' ? 'aws_s3' : 'local';
            if (array_key_exists('file', $data) && $data['file']) {
                $url                        = $this->saveFile($data['file'], $request->file('file')->getMimeType(), false);
                $data['image']['storage']   = $storage;
                $data['image']['image']     = $url;
            }

            $offline_payment_id = null;
            if ($data['payment_type'] == 'offline_method') {
                $offline_payment            = $offline->get($data['id']);
                $offline_payment_id         = $data['id'];
                $payment_details['name']    = $offline_payment->name;
                $payment_details['image']   = $offline_payment->image;
                $payment_details['type']    = $offline_payment->type;
                $status = 0;
            }

            $this->subscriptionSettle($package,$data,$wallet);

            if ($subscription && $package->id == $subscription->seller_package_id) {
                $this->sellerSubscription->update([
                    'status'                => $status,
                    'payment_method'        => $data['payment_type'],
                    'payment_details'       => $payment_details,
                    'product_upload_limit'  => $package->product_upload_limit,
                    'expires_at'            => Carbon::parse($subscription->expires_at)->addDays($package->duration),
                ], $subscription->id);
            }
            else{
                $row = [
                    'user_id'               => authId(),
                    'seller_package_id'     => $package->id,
                    'payment_method'        => $data['payment_type'],
                    'offline_method_id'     => $offline_payment_id,
                    'offline_method_file'   => $data['image'],
                    'amount'                => $package->price,
                    'purchase_at'           => now(),
                    'expires_at'            => now()->addDays($package->duration),
                    'trx_id'                => $data['trx_id'],
                    'payment_details'       => $payment_details,
                    'product_upload_limit'  => $package->product_upload_limit,
                    'status'                => $status,
                ];
                $this->sellerSubscription->store($row);
            }

            Toastr::success(__('package_purchased_successfully'));

            if (request()->ajax())
            {
                return response()->json([
                    'success'       => true,
                    'message'       => __('package_purchased_successfully'),
                    'package_id'    => $package->id,
                    'url'           => route('seller.packages'),
                ]);
            }
            return redirect()->route('seller.packages');
        } catch (\Exception $e) {
            DB::rollBack();
            if (request()->ajax())
            {
                return response()->json([
                    'error' => $e->getMessage(),
                    'url'   => url()->previous(),
                ]);
            }
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function offlinePurchaseHistory(Request $request)
    {
        try {
            $sorting = $request->s;

            if (!$sorting)
            {
                $sorting = 'latest_on_top';
            }

            $input              = $request->all();
            $input['s']         = $sorting;
            $input['offline']   = 'offline';
            $input['q']         = $request->q;
            $input['user_id']   = authId();

            $data = [
                'purchases' => $this->sellerSubscription->paginate(get_pagination('index_form_paginate'),$input),
                's'         => $sorting,
                'q'         => $request->q,
            ];
            return view('seller.packages.offline_purchase_history', $data);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function onlinePurchaseHistory(Request $request)
    {
        try {
            $sorting = $request->s;

            if (!$sorting)
            {
                $sorting = 'latest_on_top';
            }

            $input              = $request->all();
            $input['s']         = $sorting;
            $input['q']         = $request->q;
            $input['user_id']   = authId();

            $data = [
                'purchases' => $this->sellerSubscription->paginate(get_pagination('index_form_paginate'),$input),
                's'         => $sorting,
                'q'         => $request->q,
            ];
            return view('seller.packages.online_purchase_history', $data);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back();
        }
    }
}
