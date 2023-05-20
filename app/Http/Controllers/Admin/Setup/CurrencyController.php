<?php

namespace App\Http\Controllers\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setup\CurrencyFormatRequest;
use App\Http\Requests\Admin\Setup\CurrencyRequest;
use App\Repositories\Admin\CurrencyRepository;
use App\Repositories\Interfaces\Admin\SettingInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{
    protected $settings;
    protected $currencies;

    public function __construct(CurrencyRepository $currencies, SettingInterface $settings)
    {
        $this->currencies   = $currencies;
        $this->settings     = $settings;
    }

    public function index()
    {
        try {
            $currencies = $this->currencies->paginate(get_pagination('pagination'));
            return view('admin.system-setup.currency', compact('currencies'));
        } catch (\Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function store(CurrencyRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        DB::beginTransaction();
        try {
            $this->currencies->store($request);
            Toastr::success(__('Created Successfully'));
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function update(CurrencyRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        DB::beginTransaction();
        try {
            $this->currencies->update($request);
            Toastr::success(__('Updated Successfully'));
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function statusChange(Request $request)
    {
        if (isDemoServer()):
            $response['message']    = __('This function is disabled in demo server.');
            $response['title']      = __('Ops..!');
            $response['status']     = 'error';
            return response()->json($response);
        endif;

        DB::beginTransaction();
        try {
            $this->currencies->statusChange($request['data']);
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

    public function setDefault($id): \Illuminate\Http\RedirectResponse
    {
        if (isDemoServer()):
            Toastr::error(__('This function is disabled in demo server.'));
            return back();
        endif;

        try {

            $request = new \Illuminate\Http\Request();
            $request->setMethod('POST');
            $request->request->add(['default_currency' => $id]);

            $this->settings->update($request);
            Toastr::success(__('Updated Successfully'));
            return back();
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function setCurrencyFormat(CurrencyFormatRequest $request){

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

}
