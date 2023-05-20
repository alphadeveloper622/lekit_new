<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryWithoutChildResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'icon'              => nullCheck($this->icon),
            'parent_id'         => (int)$this->parent_id,
            'slug'              => $this->slug,
            'title'             => $this->getTranslation('title', languageCheck()),
            'total_products'    => Product::where('category_id', $this->id)->UserCheck()->IsWholesale()->IsStockOut()->ProductPublished()->count(),
            'image'             => $this->image,
        ];
    }
}
