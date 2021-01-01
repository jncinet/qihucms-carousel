<?php

namespace Qihucms\Carousel\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarouselCategory extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'uri' => $this->uri,
            'name' => $this->name,
            'carousels' => CarouselCollection::collection($this->carousels),
        ];
    }
}