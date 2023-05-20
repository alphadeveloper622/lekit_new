<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ColorRequest;
use App\Http\Requests\Admin\ColorUpdateRequest;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Repositories\Interfaces\Admin\Product\ColorInterface;
use App\Repositories\Interfaces\Admin\Product\ColorLanguageInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{

    protected $colors;
    protected $colorLanguage;
    protected $languages;

    public function __construct(ColorInterface $colors, ColorLanguageInterface $colorLanguage, LanguageInterface $languages)
    {
        $this->colors           = $colors;
        $this->colorLanguage    = $colorLanguage;
        $this->languages        = $languages;
    }
    public function index()
    {
        $colors = $this->colors->paginate(get_pagination('index_form_paginate'));
        return view('admin.products.colors.index', compact('colors'));
    }

        public function store(ColorRequest $request)
        {
            if (isDemoServer()):
                Toastr::info(__('This function is disabled in demo server.'));
                return redirect()->back();
            endif;

            DB::beginTransaction();
            try {
                $this->colors->store($request);
                Toastr::success(__('Created Successfully'));
                DB::commit();
                return redirect()->route('colors');
            } catch (\Exception $e) {
                DB::rollBack();
                Toastr::error($e->getMessage());
                return redirect()->back();
            }

        }

    public function edit($id, Request $request)
    {
        $languages  = $this->languages->all()->orderBy('id', 'asc')->get();
        $lang       = $request->lang != '' ? $request->lang : \App::getLocale();
        $r          = $request->r != ''? $request->r : $request->server('HTTP_REFERER');
        if ($color_language  = $this->colors->getByLang($id, $lang)) :
            return view('admin.products.colors.update', compact('color_language','languages','lang','r'));
        else :
            Toastr::error(__('Not found'));
            return back();
        endif;
    }
    public function update(ColorUpdateRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        DB::beginTransaction();
        try {
            $this->colors->update($request);
            Toastr::success(__('Updated Successfully'), __('Success'));
            DB::commit();
            return redirect($request->r);
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
}
