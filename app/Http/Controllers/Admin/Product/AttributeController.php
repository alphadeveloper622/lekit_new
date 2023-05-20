<?php
namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\AttributeRequest;
use App\Http\Requests\Admin\Product\AttributeValuesRequest;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use App\Repositories\Interfaces\Admin\Product\AttributeInterface;
use App\Repositories\Interfaces\Admin\Product\CategoryInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    protected $attribute;
    protected $languages;
    protected $categories;

    public function __construct(AttributeInterface $attribute, LanguageInterface $languages, CategoryInterface $categories)
    {
        $this->attribute    = $attribute;
        $this->languages    = $languages;
        $this->categories   = $categories;
    }

    public function index()
    {
        $attributes = $this->attribute->paginate(get_pagination('index_form_paginate'));
        $categories                 = $this->categories->allCategory()->where('parent_id', null)->where('status',1);
        return view('admin.products.attributes.index', compact('attributes','categories'));
    }

    public function store(AttributeRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        DB::beginTransaction();
        try {
            $this->attribute->store($request);
            Toastr::success(__('Created Successfully'));
            DB::commit();
            return redirect()->route('attributes');
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
            $categories                 = $this->categories->allCategory()->where('parent_id', null)->where('status',1);
            $lang       = $request->lang != '' ? $request->lang : \App::getLocale();
            $r          = $request->r != ''? $request->r : $request->server('HTTP_REFERER');
            if ($attribute_language  = $this->attribute->getByLang($id, $lang)) :
                return view('admin.products.attributes.update', compact('attribute_language','categories', 'languages', 'lang', 'r'));
            else:
                Toastr::error(__('Not found'));
                return back()->withInput();
            endif;
        } catch (\Exception $e){
             Toastr::error($e->getMessage());
            return back()->withInput();
        }
    }

    public function update(AttributeRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        DB::beginTransaction();
        try {
            $this->attribute->update($request);
            Toastr::success(__('Updated Successfully'));
            DB::commit();
            return redirect($request->r);
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
    public function attributeValues($id)
    {
        DB::beginTransaction();
        try {
            $attribute = $this->attribute->get($id) and $attributeValues = $this->attribute->getAttributeValues($id,get_pagination('index_form_paginate'));
            DB::commit();
            return view('admin.products.attributes.attributes-values', compact('attribute', 'attributeValues'));
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
    public function attributeValuesStore(AttributeValuesRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        DB::beginTransaction();
        try {
            $this->attribute->AttributeValuesStore($request);
            Toastr::success(__('Created Successfully'));
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
    public function attributeValuesEdit($id, Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $this->attribute->AttributeValuesEdit($id);
            $r = $request->r != '' ? $request->r : $request->server('HTTP_REFERER');
            DB::commit();
            return view('admin.products.attributes.attribute-values-update', compact('data', 'r'));
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
    public function attributeValuesUpdate(AttributeValuesRequest $request)
    {
        if (isDemoServer()):
            Toastr::info(__('This function is disabled in demo server.'));
            return redirect()->back();
        endif;

        $this->attribute->AttributeValuesUpdate($request);
        Toastr::success(__('Updated Successfully'));
        return redirect($request->r);
    }
    public function allValues(){
        DB::beginTransaction();
        try {
            $attributeValues = $this->attribute->allAttributeValuesPaginate(get_pagination('index_form_paginate')) and $attributes = $this->attribute->all()->where('lang', 'en')->get();
            DB::commit();
            return view('admin.products.attributes.all-attribute-values', compact('attributeValues', 'attributes'));
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
}
