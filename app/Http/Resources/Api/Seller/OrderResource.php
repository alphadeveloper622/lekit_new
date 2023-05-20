<?php

namespace App\Http\Resources\Api\Seller;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                => $this->order->id,
            'product_id'        => $this->product_id,
            'image_72x72'       => $this->product->image_72x72,
            'delivery_status'   => $this->order->delivery_status,
            'is_refunded'       => $this->product->is_refundable,
            'total_amount'      => number_format($this->order->total_payable,3,'.',''),
            'code'              => $this->order->code,
            'payment_method'    => $this->order->payment_type,
            'customer_name'     => nullCheck(@$this->order->user->full_name),
            'customer_phone'    => nullCheck(@$this->order->user->phone),
            'date'              => $this->order->date,
        ];
    }
}
