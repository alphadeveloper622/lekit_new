<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\CategoryRequest;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Repositories\Interfaces\Admin\Product\CategoryInterface;
use App\Repositories\Interfaces\Admin\Product\CategoryLanguageInterface;
use App\Repositories\Interfaces\Admin\StoreProfileInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $category;
    protected $catLang;
    protected $languages;
    protected $stores;

    public function __construct(CategoryInterface $category, CategoryLanguageInterface $catLang, LanguageInterface $languages,StoreProfileInterface $stores)
    {
        $this->category     = $category;
        $this->catLang      = $catLang;
        $this->languages    = $languages;
        $this->stores    = $stores;
    }

    public function index(Request $request)
    {
        try {
            $categories     = $this->category->paginate(get_pagination('index_form_paginate'),$request);
            //dd($this->category->allCategory()->where('parent_id', null));
            $all_categories = $this->category->allCategory()->where('parent_id', null)->where('stores_id', '=', $request->store_id);
            $stores=$this->stores->all()->get();
            $store_id=$request->store_id;
            return view('admin.products.categories.index', compact('categories','all_categories','stores','store_id'));
        } catch (\Exception $e) {
             Toastr::error($e->getMessage());
            return back();
        }
    }

    
    public function store(CategoryRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        $validated = $request->validate([
            'title' => 'required|unique:category_languages',
        ]);

        DB::beginTransaction();
        try {
            $position_up = $this->category->store($request);
            if ($position_up === 'position_up'):
                Toastr::error(__('You cannot add anymore child of this category'));
                return back()->withInput();
            endif;
            Toastr::success(__('Created Successfully'));
            DB::commit();
            return redirect()->route('categories',['store_id' => $request->get('store')]);
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

            $lang       = $request->lang != '' ? $request->lang : \App::getLocale();
            if ($category_language = $this->category->getByLang($id, $lang)):
                $store_id=$this->category->get($id)->stores_id;
                $all_categories = $this->category->getCategories($id)->where('stores_id','=',$store_id);
                $r              = $request->r != ''? $request->r : $request->server('HTTP_REFERER');
                //$store_id=$request->get('store')
                $store=$store_id;
                return view('admin.products.categories.update', compact('category_language','all_categories', 'languages', 'lang','r','store'));
            else:
                Toastr::error(__('Not found'));
                return back();
            endif;
        } catch (\Exception $e){
             Toastr::error($e->getMessage());
            return back();
        }
    }

    public function update(CategoryRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        DB::beginTransaction();
        try {
            $position_up = $this->category->update($request);
            if ($position_up === 'position_up'):
                Toastr::error(__('You cannot add anymore child of this category'));
                return back()->withInput();
            endif;
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
            $this->category->statusChange($request['data']);
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
    public function ajaxCategoryFilter(Request $request){
        $term           = trim($request->q);
        if (empty($term)) {
            return \Response::json([]);
        }

        $categories = $this->category->ajaxCategoryFilter($term);
        $formatted_category   = [];


        foreach ($categories as $category) {
            if($category->position == 2):
                $position = '¦--¦--';
            elseif($category->position == 1):
                $position = '¦--';
            else:
                $position = '';
            endif;
            $formatted_category[] = ['id' => $category->id, 'text' => $position.$category->getTranslation('title', \App::getLocale())];
        }

        return \Response::json($formatted_category);
    }
}
