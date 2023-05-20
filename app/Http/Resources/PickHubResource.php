<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PickHubResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id"                => (int)$this->id,
            "user_id"           => (int)$this->user_id,
            "phone"             => $this->phone,
            "pick_up_status"    => (int)$this->pick_up_status,
            "created_at"        => $this->created_at,
            "updated_at"        => $this->updated_at,
            "address"           => $this->address,
            "name"              => $this->name
        ];
    }
}
