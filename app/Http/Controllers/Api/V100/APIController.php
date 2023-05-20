<?php

namespace App\Http\Controllers\Api\V100;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddOnResource;
use App\Http\Resources\PageResource;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Language;
use App\Repositories\Admin\Page\PageRepository;
use App\Repositories\Interfaces\Admin\AddonInterface;
use App\Repositories\Interfaces\Admin\Page\PageInterface;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class   APIController extends Controller
{
    use ApiReturnFormatTrait;

    public function config(AddonInterface $addon,PageRepository $pageRepository,Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $languages = Language::where('status',1)->selectRaw('id,name,locale as code,text_direction,flag')->get();

            $currencies = Currency::where('status',1)->selectRaw('id,name,symbol,code,exchange_rate')->get();

            $country = Country::find(settingHelper('default_country'));

            $currency_lists = [];
            $id = 0;

            foreach ($currencies as $currency) {
                $id                 = $currency->id;
                $currency_lists[]   = [
                    'id'            => (int)$currency->id,
                    'name'          => $currency->name,
                    'symbol'        => $currency->symbol,
                    'code'          => $currency->code,
                    'exchange_rate' => (double)$currency->exchange_rate,
                ];
            }

            if (count($currencies) > 0)
            {
                $usd = $currencies->where('code','USD')->first();
                if (!$usd)
                {
                    $currency_lists[]   = [
                        'id'            => $id+1,
                        'name'          => 'US Dollar',
                        'symbol'        => '$',
                        'code'          => 'USD',
                        'exchange_rate' => 1,
                    ];
                }
            }
            else{
                $currency_lists[]   = [
                    'id'            => $id+1,
                    'name'          => 'US Dollar',
                    'symbol'        => '$',
                    'code'          => 'USD',
                    'exchange_rate' => 1,
                ];
            }

            $data = [
                'app_config'                => [
                    'login_mandatory'       => settingHelper('mandatory_login') == 1,
                    'intro_skippable'       => settingHelper('intro_skippable') == 1,
                    'privacy_policy_url'    => nullCheck(settingHelper('privacy_policy_url')),
                    'terms_condition_url'   => nullCheck(settingHelper('terms_condition_url')),
                    'support_url'           => nullCheck(settingHelper('support_url')),
                    'seller_system'         => settingHelper('seller_system') == 1,
                    'color_system'          => settingHelper('color') == 1,
                    'pickup_point_system'   => settingHelper('pickup_point') == 1,
                    'wallet_system'         => settingHelper('wallet_system') == 1,
                    'coupon_system'         => settingHelper('wallet_system') == 1,
                    'disable_otp'           => (bool)settingHelper('disable_otp_verification'),
                    'disable_guest'         => (bool)settingHelper('disable_guest_checkout'),
                    'disable_email'         => (bool)settingHelper('disable_email_confirmation'),
                    'default_country'       => $country ? $country->iso2 : 'BD',
                ],
                'android_version'       => [
                    'apk_version'       => settingHelper('latest_apk_version'),
                    'apk_code'          => settingHelper('latest_apk_code'),
                    'apk_file_url'      => settingHelper('apk_file_url'),
                    'whats_new'         => settingHelper('whats_new_latest_apk'),
                    'update_skippable'  => (bool)settingHelper('android_skippable'),
                ],
                'ios_version'           => [
                    'ipa_version'       => settingHelper('latest_ipa_version'),
                    'ipa_code'          => settingHelper('latest_ipa_code'),
                    'ipa_file_url'      => settingHelper('ipa_file_url'),
                    'whats_new'         => settingHelper('whats_new_latest_ipa'),
                    'update_skippable'  => (bool)settingHelper('ios_skippable'),
                ],
                'languages'                     => count($languages) > 0 ? $languages->makeHidden(['flag']) : [],
                'currencies'                    => $currency_lists,
                'pages'                         => PageResource::collection($pageRepository->allPages()),
                'addons'                        => AddOnResource::collection($addon->all()->get()),
                'currency_config'               => [
                    'currency_symbol_format'    => (string)settingHelper('currency_symbol_format'),
                    'decimal_separator'         => (string)settingHelper('decimal_separator'),
                    'no_of_decimals'            => (string)settingHelper('no_of_decimals'),
                ]
            ];
            return $this->responseWithSuccess(__('Config Retrieved'), $data, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], null);
        }
    }

    public function page(PageInterface $page,$id,Request $request)
    {
        try {
            $page = $page->get($id);
            $data = [
                'page' => $page,
                'lang' => $request->lang,
            ];
            return view('api.page',$data);
        } catch (\Exception $e) {
            return response()->json([
                'error' =>  $e->getMessage()
            ]);
        }
    }

    public function importDb()
    {
        $path   = base_path('public/sql/hera_yoori.sql');
        $sql    = file_get_contents($path);
        DB::unprepared($sql);
    }
}
