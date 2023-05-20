<?php

namespace App\Http\Resources\Api;

use App\Http\Resources\SubCategoryResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'icon'              => nullCheck($this->icon),
            'parent_id'         => (int)$this->parent_id,
            'slug'              => $this->slug,
            'banner'            => $this->popular_banner,
            'total_products'    => Product::where('category_id', $this->id)->UserCheck()->IsWholesale()->IsStockOut()->ProductPublished()->count(),
            'title'             => $this->getTranslation('title',apiLanguage($request->lang)),
            'image'             => $this->popular_image,
            'sub_categories'    => SubCategoryResource::collection($this->childCategories->where('status',1)),
        ];
    }
}
