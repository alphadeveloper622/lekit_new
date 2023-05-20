<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $casts        =['meta_image'=> 'array'];
    protected $attributes   =['meta_image'=> '[]'];
    protected $appends = ['address'];

    public function pageLanguage(){
        return $this->hasMany(PageLanguage::class);
    }

    public function getTranslation($field, $lang = 'en')
    {

        $page_translation  = $this->hasMany(PageLanguage::class)->where('lang', $lang)->first();

        if (blank($page_translation)):
            $page_translation = $this->hasMany(PageLanguage::class)->where('lang', 'en')->first();
        endif;
        return $page_translation->$field;
    }

    public function currentLanguage(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PageLanguage::class);
    }
    public function getAddressAttribute()
    {
        return @$this->translate->address;
    }

    public function getTranslateAttribute()
    {
        $lang = languageCheck();
        $row = $this->currentLanguage->where('page_id', $this->id)->where('lang', $lang)->first();
        if (!$row)
            $row = $this->currentLanguage->where('page_id', $this->id)->where('lang', 'en')->first();

        return $row;

    }

    }
