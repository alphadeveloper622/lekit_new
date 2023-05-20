<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\Admin\Product\BrandStoreRequest;
use App\Http\Requests\Admin\Product\BrandUpdateRequest;
use App\Repositories\Interfaces\Admin\Product\BrandInterface;
use App\Repositories\Interfaces\Admin\Product\BrandLanguageInterface;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    protected $brands;
    protected $brandLanguage;
    protected $languages;

    public function __construct(BrandInterface $brands, BrandLanguageInterface $brandLanguage, LanguageInterface $languages)
    {
        $this->brands           = $brands;
        $this->brandLanguage    = $brandLanguage;
        $this->languages        = $languages;
    }

    public function index(Request $request)
    {
        try {
            $brands = $this->brands->paginate(get_pagination('index_form_paginate'),$request);
            return view('admin.products.brands.index', compact('brands'));
        } catch (\Exception $e){
             Toastr::error($e->getMessage());
            return back();
        }
    }

    public function store(BrandStoreRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;
        DB::beginTransaction();
        try {
            $this->brands->store($request);
            Toastr::success(__('Created Successfully'));
            DB::commit();
            return redirect()->route('brands');
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

            if ($brand_language  = $this->brands->getByLang($id, $lang)) :
                return view('admin.products.brands.update', compact('brand_language', 'languages', 'lang', 'r'));
            else:
                Toastr::error(__('Not found'));
                return back();
            endif;
        } catch (\Exception $e){
             Toastr::error($e->getMessage());
            return back();
        }
    }

    public function update(BrandUpdateRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        DB::beginTransaction();
        try {
            $this->brands->update($request);
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
            $this->brands->statusChange($request['data']);
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
