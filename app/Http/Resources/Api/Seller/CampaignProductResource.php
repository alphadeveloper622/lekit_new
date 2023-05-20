<?php

namespace App\Http\Resources\Api\Seller;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CampaignProductResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($data) {
                $special_discount = $data->discount;

                $type = $data->discount_type;

                if ($type == 'flat')
                {
                    $amount = $data->product->price - $special_discount;
                }
                else{
                    $amount = $data->product->price - ($data->product->price*($special_discount/100));
                }


                return [
                    'id'                => $data->id,
                    'product_id'        => $data->product_id,
                    'product_name'      => $data->product->getTranslation('name'),
                    'discount_type'     => $data->discount_type,
                    'image'             => $data->product->image_190x230,
                    'status'            => ucfirst($data->status),
                    'price'             => number_format($data->product->price,3,'.',''),
                    'special_discount'  => number_format($data->discount,3,'.',''),
                    'discount_price'    => $amount,
                ];
            }),

            'total'         => $this->total(),
            'count'         => $this->count(),
            'per_page'      => $this->perPage(),
            'current_page'  => $this->currentPage(),
            'total_pages'   => $this->lastPage(),
            'last_page'     => $this->lastPage(),
            'next_page_url' => $this->nextPageUrl(),
            'has_more_data' => $this->hasMorePages(),

        ];
    }
}
