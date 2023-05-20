<?php

namespace App\Repositories\Admin;

use App\Models\StoreCategoryLanguage;
use App\Repositories\Interfaces\Admin\StoreCategoryLanguageInterface;
use App\Traits\SlugTrait;
use DB;

class StoreCategoryLanguageRepository implements StoreCategoryLanguageInterface
{
    use SlugTrait;

    public function get($id)
    {
        return StoreCategoryLanguage::find($id);
    }
    public function getByLang($id, $request)
    {
        return StoreCategoryLanguage::where('category_id', $id)->where('lang', $request->lang);
    }

    public function all()
    {
        return StoreCategoryLanguage::latest();
    }

    public function paginate($limit)
    {
        return $this->all()->paginate($limit);
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $catLang                      = new  StoreCategoryLanguage();
            $catLang->title               = $request->title;
            $catLang->store_category_id         = $request->category_id;
            $catLang->lang                = $request->lang;
            $catLang->meta_title          = $request->meta_title;
            $catLang->meta_description    = $request->meta_description;
            $catLang->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {
            $catLang                      = $this->get($request->cat_lang_id);
            $catLang->title               = $request->title;
            $catLang->store_category_id         = $request->category_id;
            $catLang->lang                = $request->lang != '' ? $request->lang : 'en' ;
            $catLang->meta_title          = $request->meta_title;
            $catLang->meta_description    = $request->meta_description;
            $catLang->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}

