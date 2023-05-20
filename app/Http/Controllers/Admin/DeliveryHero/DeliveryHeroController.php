<?php

namespace App\Http\Controllers\Admin\DeliveryHero;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeliveryHero\DeliveryHeroRequest;
use App\Http\Requests\Admin\DeliveryHero\DeliveryHeroUpdateRequest;
use App\Repositories\Interfaces\Admin\DeliveryHero\DeliveryHeroInterface;
use App\Repositories\Interfaces\Admin\Order\PickupHubInterface;
use App\Repositories\Interfaces\Admin\SettingInterface;
use App\Repositories\Interfaces\Admin\ShippingInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryHeroController extends Controller
{
    private $pickup;
    private $shipping;
    private $deliveryHero;
    private $settings;
    private $delivery_heroes;

    public function __construct(DeliveryHeroInterface $deliveryHero,
                                PickupHubInterface $pickup,
                                ShippingInterface $shipping,
                                SettingInterface $settings)
                            {
                                $this->pickup       = $pickup;
                                $this->shipping     = $shipping;
                                $this->deliveryHero = $deliveryHero;
                                $this->settings      = $settings;
                            }
    public function index(Request $request){
        $deliveryHeroes = $this->deliveryHero->paginate($request, get_pagination('pagination'));
        $pickupHubs     = $this->pickup->all()->where('pick_up_status',1)->get();
        return view('admin.delivery-hero.index',compact('deliveryHeroes','pickupHubs'));
    }
    public function create(){
        $countries = $this->shipping->countries()->where('status', 1)->get();
        $pickupHubs = $this->pickup->all()->where('pick_up_status', 1)->get();
        return view('admin.delivery-hero.add-delivery-hero', compact('countries','pickupHubs'));
    }
    public function store(DeliveryHeroRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        DB::beginTransaction();
        try {
            $this->deliveryHero->store($request);
            Toastr::success(__('Created Successfully'));
            DB::commit();
            return redirect()->route('delivery.hero');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error($e->getMessage());
            return back()->withInput();
        }
    }
    public function edit(Request $request, $id)
    {
        if ($user = $this->deliveryHero->get($id)):
            if ($user->user_type == 'delivery_hero'):

                $countries      = $this->shipping->countries()->where('status', 1)->get();
                $pickupHubs     = $this->pickup->all()->where('pick_up_status', 1)->get();
                $r              = $request->r != ''? $request->r : $request->server('HTTP_REFERER');

                return view('admin.delivery-hero.edit-delivery-hero', compact('user', 'r','countries','pickupHubs'));
            else:
                Toastr::error(__('Not found'));
                return back();
            endif;
        else:
            Toastr::error(__('Not found'));
            return back();
        endif;
    }
    public function update(DeliveryHeroUpdateRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        DB::beginTransaction();
        try {
            $this->deliveryHero->update($request);
            Toastr::success(__('Updated Successfully'));
            DB::commit();
            return redirect($request->r);
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
    public function commissionHistory(Request $request){
        if ($commissionHistory = $this->deliveryHero->commissionHistory($request,get_pagination('pagination'))):
            return view('admin.delivery-hero.delivery_hero_commission_history', compact('commissionHistory'));
        else:
            Toastr::error(__('Not found'));
            return back();
        endif;
    }
    public function depositHistory(Request $request){
        if ($depositHistory = $this->deliveryHero->depositHistory($request,get_pagination('pagination'))):
            return view('admin.delivery-hero.deposit-history',compact('depositHistory'));
        else:
            Toastr::error(__('Not found'));
            return back();
        endif;
    }
    public function collectionHistory(Request $request){
        if ($collectionHistory = $this->deliveryHero->collectionHistory($request,get_pagination('pagination'))):
            return view('admin.delivery-hero.collection-history',compact('collectionHistory'));
        else:
            Toastr::error(__('Not found'));
            return back();
        endif;
    }
    public function cancelRequest(Request $request){
        if ($cancelRequests = $this->deliveryHero->cancelRequests($request,get_pagination('pagination'))):
            return view('admin.delivery-hero.cancel-request',compact('cancelRequests'));
        else:
            Toastr::error(__('Not found'));
            return back();
        endif;
    }
    public function configuration(){
        return view('admin.delivery-hero.configuration');
    }
    public function deliveryHeroConfigUpdate(Request $request){
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        if($request->has('delivery_hero_send_mail')):
            $request["delivery_hero_send_mail"] = 1;
        else:
            $request["delivery_hero_send_mail"] = 0;
        endif;
        if($request->has('delivery_hero_OTP')):
            $request['delivery_hero_OTP'] = 1;
        else:
            $request['delivery_hero_OTP'] = 0;
        endif;
        DB::beginTransaction();
        try {
            $this->settings->update($request);
            Toastr::success(__('Setting Updated Successfully'));
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
    public function collectFormDeliveryHero(Request $request){
        if ($this->deliveryHero->getHero($request->delivery_hero_id)->user->balance >= $request->amount):
            DB::beginTransaction();
            try {
                $this->deliveryHero->collectFormDeliveryHero($request);
                DB::commit();
                Toastr::success(__('Amount collected from delivery hero successfully'));
                return redirect()->back();
            } catch (\Exception $e) {
                DB::rollBack();
                Toastr::error($e->getMessage());
                return redirect()->back();
            }
        else:
            Toastr::error( __('Not enough amount to collect'));
            return back();
        endif;
    }
    public function salaryToDeliveryHero(Request $request){
        DB::beginTransaction();
        try {
            $this->deliveryHero->salaryToDeliveryHero($request);
            Toastr::success(__('Salary Paid to delivery hero successfully'));
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
}
