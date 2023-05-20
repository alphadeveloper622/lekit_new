<?php

namespace App\Http\Controllers\Admin\MobileApps;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Http\Requests\Admin\MobileApps\AppIntroStoreRequest;
use App\Http\Requests\Admin\MobileApps\AppIntroUpdateRequest;
use App\Repositories\Interfaces\Admin\MobileApps\AppIntroInterface;
use App\Repositories\Interfaces\Admin\MobileApps\AppIntroLanguageInterface;
use Illuminate\Support\Facades\DB;

class AppIntroController extends Controller
{
    protected $appIntro;
    protected $appIntroLanguage;
    protected $languages;
    public function __construct(AppIntroInterface $appIntro , AppIntroLanguageInterface $appIntroLanguage , LanguageInterface $languages)
    {
        $this->appIntro          = $appIntro;
        $this->appIntroLanguage  = $appIntroLanguage;
        $this->languages         = $languages;
    }
    public function index(){
        try {
            $appIntros = $this->appIntro->paginate(get_pagination('index_form_paginate'));
            return view('admin.mobile-apps.app-intro', compact('appIntros'));
        } catch (\Exception $e){
             Toastr::error($e->getMessage());
            return back();
        }
    }
    public function store(AppIntroStoreRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        DB::beginTransaction();
        try {
            $this->appIntro->store($request);
            Toastr::success(__('Created Successfully'));
            DB::commit();
            return redirect()->back()->with('success', __('Data added Successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id, Request $request)
    {
        try {
            $languages  = $this->languages->all()->orderBy('id', 'asc')->get();
            $r          = $request->r != ''? $request->r : $request->server('HTTP_REFERER');
            $lang       = $request->lang != '' ? $request->lang : \App::getLocale();
            if ($appIntroLanguage  = $this->appIntro->getByLang($id, $lang)) :
                return view('admin.mobile-apps.app-intro-update', compact('appIntroLanguage','lang', 'languages','r'));
            else:
                Toastr::error(__('Not found'));
                return back();
            endif;
        } catch (\Exception $e){
             Toastr::error($e->getMessage());
            return back();
        }
    }

    public function update(AppIntroUpdateRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        DB::beginTransaction();
        try {
            $this->appIntro->update($request);
            Toastr::success(__('Updated Successfully'));
            DB::commit();
            return redirect($request->r);
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
            $this->appIntro->statusChange($request['data']);
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
