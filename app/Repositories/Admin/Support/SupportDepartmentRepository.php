<?php

namespace App\Repositories\Admin\Support;

use App\Models\SupportDepartment;
use App\Models\SupportDepartmentLanguages;
use App\Repositories\Interfaces\Admin\Support\SupportDepartmentInterface;
use App\Repositories\Interfaces\Admin\Support\SupportDepartmentLanguageInterface;
use App\Traits\SlugTrait;
use Illuminate\Support\Facades\DB;

class SupportDepartmentRepository implements SupportDepartmentInterface
{

    use SlugTrait;
    private $supportDepartmentLanguage;
    public function __construct(SupportDepartmentLanguageInterface $supportDepartmentLanguage ){
        $this->supportDepartmentLanguage = $supportDepartmentLanguage;
    }
    public function all()
    {
        return SupportDepartment::latest();
    }

    public function get($id)
    {
        return SupportDepartment::find($id);
    }

    public function store($request)
    {
            $department                  = new  SupportDepartment();
            $department->slug            = $this->getSlug($request->title, $request->slug);
            $department->save();

            $request['support_department_id'] = $department->id;
            if ($request->lang == ''):
                $request['lang']    = 'en';
            endif;
            $this->supportDepartmentLanguage->store($request);
            return true;
    }

    public function edit($id){
        return SupportDepartment::find($id);
    }

    public function getByLang($id, $lang)
    {
        if($lang == null):

            $supportDepartmentByLang = SupportDepartmentLanguages::with('supportDepartment')->where('lang', 'en')->where('support_department_id', $id)->first();
        else:
            $supportDepartmentByLang = SupportDepartmentLanguages::with('supportDepartment')->where('lang', $lang)->where('support_department_id', $id)->first();

            if (blank($supportDepartmentByLang)):
                $supportDepartmentByLang = SupportDepartmentLanguages::with('supportDepartment')->where('lang', 'en')->where('support_department_id', $id)->first();
                $supportDepartmentByLang['translation_null'] = 'not-found';
            endif;
        endif;
        return $supportDepartmentByLang;
    }

    public function paginate($limit)
    {
       return $this->all()->paginate($limit);
    }


    public function update($request)
    {
            $department                  = $this->get($request->support_department_id);
            $department->slug            = $this->getSlug($request->title, $request->slug);
            $department->save();

            if ($request->support_department_lang_id == '') :
                $this->supportDepartmentLanguage->store($request);
            else:
                $this->supportDepartmentLanguage->update($request);
            endif;
            return true;
    }
    public function statusChange($request)
    {
            $department           = $this->get($request['id']);
            $department->status   = $request['status'];
            $department->save();
            return true;
    }
}


