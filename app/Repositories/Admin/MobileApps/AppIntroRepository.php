<?php

namespace App\Repositories\Admin\MobileApps;

use App\Models\AppIntro;
use App\Models\AppIntroLanguage;
use App\Repositories\Interfaces\Admin\MobileApps\AppIntroInterface;
use App\Traits\ImageTrait;
use DB;
use App\Repositories\Interfaces\Admin\MobileApps\AppIntroLanguageInterface;


class AppIntroRepository implements AppIntroInterface
{
    use ImageTrait;

    protected $appIntroLanguage;

    public function __construct(AppIntroLanguageInterface $appIntroLanguage)
    {
        $this->appIntroLanguage        = $appIntroLanguage;
    }

    public function get($id)
    {
        return AppIntro::find($id);
    }

    public function getByLang($id, $lang)
    {
        if($lang == null):
            $appIntroByLang = AppIntroLanguage::with('appIntro')->where('lang', 'en')->where('app_intro_id', $id)->first();
        else:
            $appIntroByLang = AppIntroLanguage::with('appIntro')->where('lang', $lang)->where('app_intro_id', $id)->first();
            if (blank($appIntroByLang)):
                $appIntroByLang = AppIntroLanguage::with('appIntro')->where('lang', 'en')->where('app_intro_id', $id)->first();
                $appIntroByLang['translation_null'] = 'not-found';
            endif;
        endif;

        return $appIntroByLang;
    }
    public function all()
    {
        return AppIntro::latest();
    }

    public function paginate($limit)
    {
        return $this->all()->paginate($limit);
    }

    public function store($request)
    {
            $appIntro                  = new  AppIntro();
            if ($request->image != ''):
                $files  = $this->getImage($request->image);
                if ($files):
                    $appIntro->image = $files;
                    $appIntro->image_id     = $request->image;
                else:
                    $appIntro->image = [];
                endif;
            else:
                $appIntro->image        = [];
            endif;

            $appIntro->save();

            $request['app_intro_id'] = $appIntro->id;
            if ($request->lang == ''):
                $request['lang']    = 'en';
            endif;
            $this->appIntroLanguage->store($request);
            return true;
}
public function update($request)
{
        $appIntro          = $this->get($request->app_intro_id);
        if ($request->image != ''):
            $files  = $this->getImage($request->image);
            if ($files):
                $appIntro->image        = $files;
                $appIntro->image_id     = $request->image;
            else:
                $appIntro->image        = [];
                $appIntro->image_id     = null;
            endif;
        else:
            $appIntro->image        = [];
            $appIntro->image_id     = null;
        endif;
        $appIntro->save();

        if ($request->app_intro_lang_id == '') :
            $this->appIntroLanguage->store($request);
        else:
            $this->appIntroLanguage->update($request);
        endif;
        return true;
}
public function statusChange($request)
    {
        $appIntro            = $this->get($request['id']);
        $appIntro->status    = $request['status'];
        $appIntro->save();
        return true;
    }
}
