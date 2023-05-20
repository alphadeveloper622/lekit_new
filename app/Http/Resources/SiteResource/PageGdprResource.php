<?php

namespace App\Http\Resources\SiteResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PageGdprResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'title' => $this->getTranslation('title', languageCheck()),
            'link'  => $this->link,
        ];
    }
}
