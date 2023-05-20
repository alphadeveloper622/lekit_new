<?php

namespace App\Http\Controllers\Admin\Support;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Support\SupportDepartmentRequest;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Repositories\Interfaces\Admin\Support\SupportDepartmentInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupportDepartmentController extends Controller
{
    protected $supportDepartment;
    protected $languages;

    public function __construct(SupportDepartmentInterface $supportDepartment, LanguageInterface $languages)
    {
        if(settingHelper('seller_system') != 1):
            abort(403);
        endif;
        $this->supportDepartment        = $supportDepartment;
        $this->languages                = $languages;
    }
    public function index(){
        $departments=$this->supportDepartment->paginate(get_pagination('index_form_paginate'));
        return view('admin.support.support-departments',compact('departments'));
    }
    public function store(SupportDepartmentRequest $request){
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        DB::beginTransaction();
        try {
            $this->supportDepartment->store($request);
            Toastr::success(__('Created Successfully'));
            DB::commit();
            return redirect()->back()->with('success', __('Data added Successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
    public function edit(Request $request, $id){
        $languages  = $this->languages->all()->orderBy('id', 'asc')->get();
        $lang       = $request->lang == '' ? \App::getLocale() : $request->lang;
        $departments=$this->supportDepartment->getByLang($id,$lang);
        return view('admin.support.update-support-department',compact('departments','languages','lang'));
    }
    public function update(SupportDepartmentRequest $request){
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        DB::beginTransaction();
        try {
            $this->supportDepartment->update($request);
            Toastr::success(__('Created Successfully'));
            DB::commit();
            return redirect()->back()->with('success', __('Data added Successfully'));
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
            $this->supportDepartment->statusChange($request['data']);
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
