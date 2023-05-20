<?php

namespace App\Http\Resources\Seller;

use App\Models\ChatRoom;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;

class OfflinePurchaseHistoryResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($data) use ($request) {
                return [
                    'id'                    => $data->id,
                    'package'               => $data->package->getTranslation('title'),
                    'image'                 => getFileLink('72x72',$data->package->image),
                    'payment_method'        => ucfirst(str_replace('_',' ',$data->payment_method)),
                    'amount'                => number_format($data->amount,3,'.',''),
                    'purchase_at'           => Carbon::parse($data->purchase_at)->format('d M Y h:i A'),
                    'status'                => $data->status == 1 ? __('Active') : __('Inactive'),
                ];
            }),

            'total' => $this->total(),
            'count' => $this->count(),
            'per_page' => $this->perPage(),
            'current_page' => $this->currentPage(),
            'total_pages' => $this->lastPage(),
            'last_page' => $this->lastPage(),
            'next_page_url' => $this->nextPageUrl(),
            'has_more_data' => $this->hasMorePages(),
        ];
    }
}
