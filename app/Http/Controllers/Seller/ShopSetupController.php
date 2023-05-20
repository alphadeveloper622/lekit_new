<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\SellerUpdateRequest;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Repositories\Interfaces\Admin\Product\BrandInterface;
use App\Repositories\Interfaces\Admin\SellerInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Sentinel;
use Illuminate\Http\Request;

class ShopSetupController extends Controller
{
    protected $sellers;
    protected $language;

    public function __construct(SellerInterface $sellers, LanguageInterface $language)
    {
        $this->sellers  = $sellers;
        $this->language = $language;
    }
    public function shop(){
        try {
            return view('seller.setup.shop-setup');
        } catch (\Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }
    public function updateShopContent(Request $request){
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        DB::beginTransaction();
        try {
            $this->sellers->sellerShopUpdate($request);
            Toastr::success(__('Shop Updated Successfully'));
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function shopDetails()
    {
        try {
            $user = $this->sellers->get(Sentinel::getUser()->id);
            return view('seller.setup.shop-details',compact('user'));
        } catch (\Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function shopDetailsUpdate(SellerUpdateRequest $request){
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        DB::beginTransaction();
        try {
            $this->sellers->sellerProfileUpdate($request);
            Toastr::success(__('Shop Details Updated Successfully'));
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function getContent(Request $request,BrandInterface $brands)
    {
        try {

            $data = [
                'type' => $request->type,
                'content_count' => $request->content_count,
                'for_content' => $request->for_content ?? '',
                'mobile' => $request->mobile == 1 ? 1 : 0,
                'brands'  => ($request->type == 'banner-image' || $request->type == 'banner') && $request->mobile == 1  ? $brands->all()->where('lang','en')->where('status',1)->get() : []
            ];

            return view('seller.setup.store-page-contents',$data);
        } catch (\Exception $e){
            $response['message'] = $e->getMessage();
            $response['status']  = 'error';
            $response['title']   = __('Ops..!');
            return response()->json($response);
        }
    }

    public function mobileShopDetails(BrandInterface $brands)
    {
        try {
            $data = [
                'mobile' => 1,
                'brands' => $brands->all()->where('lang', 'en')->where('status', 1)->get()
            ];
            return view('seller.setup.mobile-shop-setup',$data);
        } catch (\Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function mobileShopPageUpdate(Request $request){
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        $request['for_mobile'] = 1;

        DB::beginTransaction();
        try {
            $this->sellers->sellerShopUpdate($request);
            Toastr::success(__('Shop Details Updated Successfully'));
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
}
