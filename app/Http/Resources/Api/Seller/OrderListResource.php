<?php

namespace App\Http\Resources\Api\Seller;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderListResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($data)  use ($request){
                return [
                    'id'                => $data->order->id,
                    'product_id'        => $data->product_id,
                    'image_72x72'       => $data->product->image_72x72,
                    'delivery_status'   => $data->order->delivery_status,
                    'is_refunded'       => $data->product->is_refundable,
                    'total_amount'      => number_format($data->order->total_payable,3,'.',''),
                    'code'              => $data->order->code,
                    'payment_method'    => $data->order->payment_type,
                    'customer_name'     => nullCheck(@$data->order->user->full_name),
                    'customer_phone'    => nullCheck(@$data->order->user->phone),
                    'date'              => $data->order->date,
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
