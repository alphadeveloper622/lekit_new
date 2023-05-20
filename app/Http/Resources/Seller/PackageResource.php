<?php

namespace App\Http\Resources\Seller;

use App\Models\ChatRoom;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Tymon\JWTAuth\Facades\JWTAuth;

class PackageResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($data) use ($request) {
                return [
                    'id'                    => $data->id,
                    'title'                 => $data->getTranslation('title'),
                    'image'                 => getFileLink('72x72',$data->image),
                    'product_upload_limit'  => (int)$data->product_upload_limit,
                    'duration'              => $data->duration.' '.__('days'),
                    'price'                 => number_format($data->price,3,'.',''),
                ];
            })
        ];
    }
}
