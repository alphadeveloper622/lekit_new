<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shipping\CityRequest;
use App\Http\Requests\Admin\Shipping\StateRequest;
use App\Http\Requests\Admin\ShippingCommissionRequest;
use App\Models\City;
use App\Models\State;
use App\Repositories\Interfaces\Admin\SettingInterface;
use App\Repositories\Interfaces\Admin\ShippingInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
{
    protected $settings;
    protected $shipping;

    public function __construct(SettingInterface $settings, ShippingInterface $shipping)
    {
        $this->settings = $settings;
        $this->shipping = $shipping;
    }

    public function configuration()
    {
        return view('admin.shipping.configuration');
    }
    public function configurationSave(ShippingCommissionRequest $request)
    {
        if($request->shipping_fee_flat_rate):
            $request['shipping_fee_flat_rate'] = priceFormatUpdate($request->shipping_fee_flat_rate,settingHelper('default_currency'));
        endif;
        if($request->shipping_fee_default_rate):
            $request['shipping_fee_default_rate'] = priceFormatUpdate($request->shipping_fee_default_rate,settingHelper('default_currency'));
        endif;
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        DB::beginTransaction();
        try {
            $this->settings->update($request);
            Toastr::success(__('Updated Successfully'));
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
    public function countries(Request $request)
    {
        $countries = $this->shipping->countriesPaginate($request,get_pagination('pagination'));

        return view('admin.shipping.countries', compact('countries'));
    }
    public function countryStatusChange(Request $request)
    {
        if (isDemoServer()):
            $response['message']    = __('This function is disabled in demo server.');
            $response['title']      = __('Ops..!');
            $response['status']     = 'error';
            return response()->json($response);
        endif;
        DB::beginTransaction();
        try {
            $this->shipping->countryStatusChange($request['data']);
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

    public function states(Request $request)
    {
        $countries = $this->shipping->countries()->where('status', 1)->get();
        $states = $this->shipping->statesPaginate($request, get_pagination('index_form_paginate'));

        return view('admin.shipping.states', compact('states','countries'));
    }
    public function stateStore(StateRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->shipping->stateStore($request);
            Toastr::success(__('Created Successfully'));
            DB::commit();
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
    public function stateEdit(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $state=$this->shipping->getState($id);
            $countries   = $this->shipping->countries()->where('status', 1)->get();
            $r           = $request->server('HTTP_REFERER');
            DB::commit();
            return view('admin.shipping.state-edit',compact('state','countries','r'));
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
    public function stateUpdate (StateRequest $request)
    {
        if (isDemoServer()):
            $response['message']    = __('This function is disabled in demo server.');
            $response['title']      = __('Ops..!');
            $response['status']     = 'error';
            return response()->json($response);
        endif;
        DB::beginTransaction();
        try {
            $this->shipping->stateUpdate($request);
            Toastr::success(__('Updated Successfully'));
            return redirect($request->r);
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
    public function stateStatusChange(Request $request)
    {
        if (isDemoServer()):
            $response['message']    = __('This function is disabled in demo server.');
            $response['title']      = __('Ops..!');
            $response['status']     = 'error';
            return response()->json($response);
        endif;
        DB::beginTransaction();
        try {
            $this->shipping->stateStatusChange($request['data']);
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

    public function cities(Request $request)
    {
        $cities = $this->shipping->citiesPaginate($request, get_pagination('index_form_paginate'));
//        $states = $this->shipping->states()->where('status', 1)->get();

        return view('admin.shipping.cities', compact('cities'));
    }
    public function cityStore(CityRequest $request)
    {
        try {
            $this->shipping->CityStore($request);
            Toastr::success(__('Created Successfully'));
            return back();
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
    public function cityEdit(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $city=$this->shipping->getCity($id);
            $r       = $request->server('HTTP_REFERER');
            DB::commit();
            return view('admin.shipping.city-edit',compact('city','r'));
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
    public function cityUpdate (CityRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        DB::beginTransaction();
        try {
            $this->shipping->cityUpdate($request);
            Toastr::success(__('Updated Successfully'));
            DB::commit();
            return redirect($request->r);
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
    public function cityStatusChange(Request $request)
    {
        if (isDemoServer()):
            $response['message']    = __('This function is disabled in demo server.');
            $response['title']      = __('Ops..!');
            $response['status']     = 'error';
            return response()->json($response);
        endif;
        DB::beginTransaction();
        try {
            $this->shipping->cityStatusChange($request['data']);
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
    public function getStateByCountryAjax(Request $request){
        $data['states'] = $this->shipping->states()->where("country_id",$request->country_id)->where('status', 1)->get(["name","id"]);
        return response()->json($data);
    }
    public function getCityByStateAjax(Request $request){
        $data['cities'] = $this->shipping->cities()->where("state_id",$request->state_id)->where('status', 1)->get(["name","id"]);

        return response()->json($data);
    }

    public function stateImport(){
        DB::beginTransaction();
        try {
            $this->shipping->stateImport();
            Toastr::success(__('State imported successfully'));
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function importCity(): \Illuminate\Http\RedirectResponse
    {
        $max_exec_time = ini_get('max_execution_time');
        $memory_limit = ini_get('memory_limit');
/*
        if ($max_exec_time < 600)
        {
            Toastr::error(__('max_error_msg'));
            return back();
        }*/

        try {
            City::truncate();
            $path = base_path('public/sql/cities.sql');
            $sql = file_get_contents($path);
            DB::unprepared($sql);
            Toastr::success(__('Imported Successfully'),__('Success'));
            return back();
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function getStateByAjax(Request $request)
    {
        $term           = trim($request->q);
        if (empty($term)) {
            return \Response::json([]);
        }

        $states = $this->shipping->states()
            ->where('name', 'like', '%'.$term.'%')
            ->limit(20)
            ->get();

        $formatted_user   = [];

        foreach ($states as $state) {
            $formatted_user[] = ['id' => $state->id, 'text' => $state->name];
        }

        return \Response::json($formatted_user);
    }
}
