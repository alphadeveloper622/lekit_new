<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StoresCategory extends Model
{
    use HasFactory;
    protected $table = 'store_category';

    protected $appends = [];

    protected $fillable = [
        'store_id', 'category_id'
    ];

    protected $casts = [
    ];

    protected $attributes = [
    ];
    
}
