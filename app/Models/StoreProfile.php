<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreProfile extends Model
{
    use HasFactory;

    protected $table = 'stores';

    protected $appends = [];

    protected $fillable = [
        'store_name', 'seller_id', 'user_id','store_category_id', 'slug', 'store_code', 'store_phone', 'address', 'postcode', 'city', 'logo', 'main_banner', 'banner',
        'store_email', 'latitude', 'longitude', 'store_description', 'store_comments'
    ];

    protected $casts = [
        'logo' => 'array',
        'banner' => 'array',
        'main_banner' => 'array',
        'opening_hours' => 'array'
    ];

    protected $attributes = [
        'logo' => '[]',
        'banner' => '[]',
        'main_banner' => '[]'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function storesCategory(){
        return $this->belongsTo(StoresCategory::class,'store_category', 'store_id', 'category_id');
    }
    public function getImage197x152Attribute()
    {
        return getFileLink('197x152', $this->logo);
    }

    public function getImage105x75Attribute()
    {
        return @is_file_exists(@$this->logo['image_105x75'], @$this->logo['storage']) ? get_media(@$this->logo['image_105x75'], @$this->logo['storage']) : static_asset('images/default/105x75_no_bg.png');
    }

    public function getImage899x480Attribute()
    {
        return @is_file_exists(@$this->shop_banner['image_899x480'], @$this->shop_banner['storage']) ? get_media(@$this->shop_banner['image_899x480'], @$this->shop_banner['storage']) : static_asset('images/default/default-image-899x480.png');
    }

    public function getImage90x60Attribute()
    {
        return getFileLink('72x72', $this->logo);
    }

    public function getImage82x82Attribute()
    {
        return getFileLink('82x82', $this->logo);
    }

    public function getImage120x80Attribute()
    {
        return getFileLink('120x80', $this->logo);
    }

    public function getImage297x203Attribute()
    {
        return getFileLink('297x203', $this->banner);
    }

    public function getImage617x145Attribute()
    {
        return getFileLink('617x145', $this->banner);
    }

    public function getImage1920x412Attribute()
    {
        return getFileLink('1920x412', $this->banner);
    }

    public function getRatingAttribute(): float
    {
        return round($this->rating_count,2);
    }


    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class, 'user_id', 'user_id');
    }

    public function sellerProducts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class, 'user_id', 'user_id')->with('productLanguages')->ProductPublished()->take(3);
    }

    public function getStartDateAttribute(): string
    {
        return Carbon::parse($this->created_at)->format('d M Y');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function followedUsers()
    {
        return $this->hasMany(SellerProfileUser::class, 'seller_profile_id', 'id');
    }

    public function scopeAvailable($query)
    {
        return $query->where('verified_at', '!=', null)->whereHas('user', function ($q) {
            $q->where('status', 1)->where('is_user_banned', 0);
        });
    }
}
