<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerPackage extends Model
{
    use HasFactory;

    protected $fillable = ['price','product_upload_limit','duration','image','image_id','status','is_free'];

    protected $casts = ['image' => 'array'];

    public function packageLanguages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SellerPackageLanguage::class,'seller_package_id');
    }

    public function subscriptions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SellerSubscription::class,'seller_package_id');
    }

    public function activeSubscriptions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SellerSubscription::class,'seller_package_id')->where('status',1);
    }

    public function getTranslation($field, $lang = 'en')
    {
        $product_translation  = $this->packageLanguages()->where('lang', $lang)->first();

        if (blank($product_translation)):
            $product_translation = $this->packageLanguages()->where('lang', 'en')->first();
        endif;

        return $product_translation->$field;
    }
}
