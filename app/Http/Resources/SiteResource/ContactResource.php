<?php

namespace App\Http\Resources\SiteResource;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
          'phone'           =>$this->phone,
          'optional_phone'  =>$this->optional_phone,
          'email'           =>$this->email,
          'optional_email'  =>$this->optional_email,
          'address'         =>$this->address,
        ];
    }
}
