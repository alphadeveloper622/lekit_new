<?php

namespace App\Repositories\Admin;

use App\Models\FlagIcon;
use App\Models\Font;
use App\Models\Language;
use App\Models\LanguageConfig;
use App\Repositories\Interfaces\Admin\FontInterface;
use App\Repositories\Interfaces\Admin\LanguageInterface;
use Illuminate\Filesystem\Filesystem;
use JoeDixon\Translation\Drivers\Translation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class LanguageRepository implements LanguageInterface
{
    private $translation;
    private $disk;
    private $font;

    public function __construct(Filesystem $disk,Translation $translation,FontInterface $font)
    {
        $this->translation  = $translation;
        $this->disk         = $disk;
        $this->font         = $font;
    }

    public function all()
    {
        return Language::latest();
    }

    public function flags()
    {
        return FlagIcon::all();
    }

    public function paginate($limit)
    {
        return $this->all()->paginate($limit);
    }

    public function get($id)
    {
        return Language::find($id);
    }
    public function getByLocale($locale)
    {
        return Language::where('locale', $locale)->first();
    }

    public function store($request)
    {
            $language = Language::create([
                'name'      => $request->name,
                'locale'    => $request->locale,
                'flag'      => $request->flag,
                'status'    => 1
            ]);
            LanguageConfig::create([
                "language_id"   => $language->id,
                "name"          => $request->name,
                "script"        => $request->script,
                "native"        => $request->native,
                "regional"      => $request->regional
            ]);

            if($request->regular_ttf_file || $request->medium_ttf_file || $request->bold_ttf_file){
                $request['lang_id'] = $language->id;
                $this->font->store($request);
            }
            ini_set('max_execution_time', 600); //600 seconds

            $path                   = base_path('resources/lang/' . $request->locale);
            $translationPath        = base_path('resources/lang/vendor/translation/' . $request->locale);
            $json_file              = 'resources/lang/' . $request->locale . '.json';

            //make file if not exist
            if (!File::isDirectory($path)) :

                File::makeDirectory($path, 0777, true, true);
                File::copyDirectory(base_path('resources/lang/en'), $path);
            endif;
            //make file if not exist
            if (!File::isDirectory($translationPath)) :

                File::makeDirectory($translationPath, 0777, true, true);
                File::copyDirectory(base_path('resources/lang/vendor/translation/en'), $translationPath);
            endif;

            // Write json
            if(!File::exists($json_file)):
                $newJsonString = file_get_contents(base_path('resources/lang/en.json'));
                file_put_contents(base_path($json_file), $newJsonString);
            endif;
            return true;
    }

    public function update($request)
    {
        $language = $this->get($request->id);
            $language->update([
                'name'      => $request->name,
                'flag'      => $request->flag,
            ]);
            $language->languageConfig->update([
                "name"      => $request->name,
                "script"    => $request->script,
                "native"    => $request->native,
                "regional"  => $request->regional
            ]);
            if($request->regular_ttf_file || $request->medium_ttf_file || $request->bold_ttf_file){
                $font                  = Font::where('lang_id',$request->id)->first();
                if(!$font){
                    $request['lang_id'] = $request->id;
                    $request['locale'] = $language->locale;
                    $this->font->store($request);
                }else{
                    $this->font->update($request,$request->id);
                }
            }
            return true;

    }

    public function deleteConfirm($language, $id)
    {
            DB::table('languages')->delete($id);
            DB::table('language_configs')->where('language_id',$id)->delete();
            $lang_path          = base_path().DIRECTORY_SEPARATOR.'resources\lang'.DIRECTORY_SEPARATOR."$language";
            $translation_path   = base_path().DIRECTORY_SEPARATOR.'resources\lang\vendor\translation'.DIRECTORY_SEPARATOR."{$language}";
            $json_file          = base_path().DIRECTORY_SEPARATOR.'resources\lang'.DIRECTORY_SEPARATOR."{$language}.json";
            if(File::isDirectory($lang_path)):
                File::deleteDirectory($lang_path);
            endif;
            if(File::isDirectory($translation_path)):
                File::deleteDirectory($translation_path);
            endif;
            if(File::exists($json_file)):
                unlink($json_file);
            endif;
            $this->font->delete($id);
            return true;
    }

    public function statusChange($request)
    {
            $language           = $this->get($request['id']);
            $language->status   = $request['status'];
            $language->save();
            return true;
    }

    public function directionChange($request)
    {
            $language                   = $this->get($request['id']);
            $language->text_direction   = $request['status'] ? 'rtl' : 'ltr';
            $language->save();
            return true;
    }

    //for APi
    public function activeLanguages()
    {
        return Language::where('status',1)->get();
    }
}
