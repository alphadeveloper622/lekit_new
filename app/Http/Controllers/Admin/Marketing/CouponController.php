<?php

namespace App\Http\Controllers\Admin\Marketing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Marketing\CouponStoreRequest;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Repositories\Interfaces\Admin\Marketing\CouponInterface;
use App\Repositories\Interfaces\Admin\Product\ProductInterface;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    protected $coupons;
    protected $product;
    protected $languages;

    public function __construct(CouponInterface $coupons, ProductInterface $product, LanguageInterface $languages)
    {
        if(settingHelper('coupon_system') != 1):
            abort(403);
        endif;
        $this->coupons      = $coupons;
        $this->product      = $product;
        $this->languages    = $languages;
    }
    public function index(Request $request){
        $coupons = $this->coupons->paginate($request ,get_pagination('index_form_paginate'));
        return view('admin.marketing.coupons', compact('coupons'));
    }
    public function store(CouponStoreRequest $request){
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        DB::beginTransaction();
        try {
            $this->coupons->store($request);
            Toastr::success(__('Coupon Created Successfully'));
            DB::commit();
            return redirect()->route('coupons');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
    public function edit($id, Request $request){
        try {
            $lang       = $request->lang != '' ? $request->lang : \App::getLocale();
            if ($coupon_language  = $this->coupons->getByLang($id, $lang)) :
                $languages  = $this->languages->all()->orderBy('id', 'asc')->get();
                $r          = $request->r != ''? $request->r : $request->server('HTTP_REFERER');

                $startDate      = Carbon::parse($coupon_language->coupon->start_date)->format('m-d-Y h:m A');
                $endDate        = Carbon::parse($coupon_language->coupon->end_date)->format('m-d-Y h:m A');

                $date           = $startDate .' - '. $endDate;
                $products = $this->product->all()
                    ->find($coupon_language->coupon->product_id);

                return view('admin.marketing.coupon-update', compact('coupon_language','date', 'products', 'r','languages','lang'));
            else:
                Toastr::error(__('Not found'));
                return back()->withInput();
            endif;
        } catch (\Exception $e){
            Toastr::error($e->getMessage());
            return back()->withInput();
        }
    }
    public function update(CouponStoreRequest $request){
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        DB::beginTransaction();
        try {
            $this->coupons->update($request);
            Toastr::success(__('Updated Successfully'));
            DB::commit();
            return redirect($request->r);
        } catch (\Exception $e){
            DB::rollBack();
            Toastr::error($e->getMessage());
            return back()->withInput();
        }
    }

    public function statusChane(Request $request){
        if (isDemoServer()):
            $response['message']    = __('This function is disabled in demo server.');
            $response['title']      = __('Ops..!');
            $response['status']     = 'error';
            return response()->json($response);
        endif;

        DB::beginTransaction();
        try {
            $this->coupons->statusChange($request['data']);
            $response['message']    = __('Updated Successfully');
            $response['title']      = __('Success');
            $response['status']     = 'success';
            DB::commit();
            return response()->json($response);
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
}
