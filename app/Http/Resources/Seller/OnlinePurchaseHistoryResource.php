<?php

namespace App\Http\Resources\Seller;

use App\Models\ChatRoom;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;

class OnlinePurchaseHistoryResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($data) use ($request) {
                $row = [
                    'id'                    => $data->id,
                    'package'               => $data->package->getTranslation('title'),
                    'image'                 => getFileLink('72x72',$data->package->image),
                    'payment_method'        => $data->payment_method == 'offline_method' ? $data->payment_details['name'] : ucfirst(str_replace('_',' ',$data->payment_method)),
                    'amount'                => number_format($data->amount,3,'.',''),
                    'purchase_at'           => Carbon::parse($data->purchase_at)->format('d M Y h:i A'),
                    'status'                => $data->status == 1 ? __('Active') : __('Inactive'),
                ];

                if ($data->offline) {
                    $row['trx_id'] = $data->trx_id;
                    $row['offline_method_file'] = get_media($data->offline_method_file['image'],$data->offline_method_file['storage']);
                }

                return $row;
            })
        ];
    }
}
