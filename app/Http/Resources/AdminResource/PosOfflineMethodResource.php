<?php

namespace App\Http\Resources\AdminResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PosOfflineMethodResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'               => $this->id,
            'name'             => $this->name,
            'image'            => static_asset($this->thumbnail['original_image'] ?? 'images\default\105x75.png'),
            'instructions'     => $this->instructions,
        ];
    }
}
