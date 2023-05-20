<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                => (int)$this->id,
            'name'              => $this->name,
            'iso3'              => $this->iso3,
            'iso2'              => $this->iso2,
            'phonecode'         => $this->phonecode,
            'currency'          => $this->currency,
            'currency_symbol'   => $this->currency_symbol,
            'latitude'          => $this->latitude,
            'longitude'         => $this->longitude,
            'status'            => (int)$this->status,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
            'flag_icon'         => $this->flag_icon,
            'flag'              => $this->flag,
        ];
    }
}
