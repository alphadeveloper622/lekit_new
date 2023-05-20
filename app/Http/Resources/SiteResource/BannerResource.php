<?php

namespace App\Http\Resources\SiteResource;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'link'  => $this->link,
            'image' => addon_is_activated('ishopet') ? getFileLink('192x170',$this->image) : getFileLink('220x125',$this->image),
        ];
    }
}
