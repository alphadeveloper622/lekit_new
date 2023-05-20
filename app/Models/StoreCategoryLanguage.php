<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreCategoryLanguage extends Model
{
    use HasFactory;

    public function storeCategory()
    {
        return $this->belongsTo(StoreCategory::class);
    }
}
