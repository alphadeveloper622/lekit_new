<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'icon'              => nullCheck($this->icon),
            'parent_id'         => (int)$this->parent_id,
            'slug'              => $this->slug,
            'banner'            => $this->popular_banner,
            'title'             => $this->getTranslation('title',languageCheck()),
            'total_products'    => Product::where('category_id', $this->id)->UserCheck()->IsWholesale()->IsStockOut()->ProductPublished()->count(),
            'image'             => $this->popular_image,
            'child_categories'  => CategoryWithoutChildResource::collection($this->childCategories->where('status',1))
        ];
    }
}
