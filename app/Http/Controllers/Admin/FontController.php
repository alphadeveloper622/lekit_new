<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\Admin\FontInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FontController extends Controller
{
    protected $font;

    public function __construct(FontInterface $font){
        $this->font = $font;
    }
    public function index()
    {
        $font = $this->font->paginate();
        return view('admin.system-setup.pdf-font',compact('font'));
    }

    public function addFont(Request $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        $validator = Validator::make($request->all(), [
            'title'                      => 'required|max:190',
            'local'                      => 'required',
            'regular_ttf_file'           => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        DB::beginTransaction();
        try {
            $this->font->store($request);
            Toastr::success(__('Font Added Successfully'));
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function editFont($id)
    {
        try {
            if ($font  = $this->font->get($id)) :
                return view('admin.fonts.update-fonts', compact('font'));
            else:
                Toastr::error(__('Not found'));
                return back();
            endif;
        } catch (\Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function updateFont(Request $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        $validator = Validator::make($request->all(), [
            'title'                      => 'required|max:190',
            'local'                      => 'required',
            'regular_ttf_file'           => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        DB::beginTransaction();
        try {
            $this->font->update($request);
            Toastr::success(__('Font Update Successfully'));
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
        if(!$this->font->checkEmptyCredentials($request['data']['status'])):
            $response['message']    = __('You can active this service when you will configure all credentials');
            $response['title']      = __('Ops..!');
            $response['status']     = 'error';
            return response()->json($response);
        endif;
        DB::beginTransaction();
        try {
            $this->font->statusChange($request['data']);
            $response['message']    = __('Updated Successfully');
            $response['title']      = __('Success');
            $response['status']     = 'success';
            $response['type']       = 'font';
            DB::commit();
            return response()->json($response);
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        if ($font  = $this->font->delete($id)) :
            Toastr::success(__('Font Update Successfully'));
            return redirect()->back();
        else:
            Toastr::error(__('Not found'));
            return back();
        endif;
    }
}
