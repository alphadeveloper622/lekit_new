<?php

namespace App\Http\Resources\Api;

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
            'total_products'    => Product::where('category_id', $this->id)->UserCheck()->IsWholesale()->IsStockOut()->ProductPublished()->count(),
            'slug'              => $this->slug,
            'title'             => $this->getTranslation('title', apiLanguage($request->lang)),
            'image'             => $this->image,
        ];
    }
}
