<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\PickupHubRequest;
use App\Models\PickupHub;
use App\Models\User;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Repositories\Interfaces\Admin\Order\PickupHubInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PickupHubController extends Controller
{
    private $pickup;
    private $languages;
    public function __construct(PickupHubInterface $pickup, LanguageInterface $languages){
        $this->pickup       = $pickup;
        $this->languages    = $languages;

    }
    public function index(){
        $pickups  = $this->pickup->paginate(get_pagination('pagination'));
        $staffs   = User::where('user_type','staff')->get();

        return view('admin.orders.pickup-hub-index',compact('staffs','pickups'));
    }
    public function store(PickupHubRequest $request){
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        DB::beginTransaction();
        try {
            $this->pickup->store($request);
            Toastr::success(__('Setting Updated Successfully'));
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Request $request, $id){
        $languages      = $this->languages->all()->orderBy('id', 'asc')->get();
        $lang           = $request->lang == '' ? \App::getLocale() : $request->lang;
        $pickups_lang   = $this->pickup->getByLang($id,$lang);
        $staffs         = User::where('user_type','staff')->get();
        return view('admin.orders.pickup-hub-update',compact('lang','pickups_lang','languages','staffs'));

    }

    public function update(PickupHubRequest $request){
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        DB::beginTransaction();
        try {
            $this->pickup->update($request);
            Toastr::success(__('Setting Updated Successfully'));
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
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
            $this->pickup->statusChange($request['data']);
            $response['message'] = __('Updated Successfully');
            $response['title'] = __('Success');
            $response['status'] = 'success';
            DB::commit();
            return response()->json($response);
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
}
