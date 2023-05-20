<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerSubscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','seller_package_id','payment_method','offline_method_id','offline_method_file','amount','trx_id','purchase_at','expires_at','payment_details','status','product_upload_limit'];

    protected $casts = [
        'payment_details'       => 'array',
        'offline_method_file'   => 'array',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function package(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SellerPackage::class,'seller_package_id');
    }

    public function offline(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(OfflineMethod::class,'offline_method_id');
    }
}
