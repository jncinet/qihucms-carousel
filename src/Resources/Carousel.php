<?php

namespace Qihucms\Carousel\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class Carousel extends JsonResource
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
            'title' => $this->title,
            'url' => $this->url,
            'img_src' => empty($this->img_src) ? null : Storage::url($this->img_src),
            'alt' => $this->alt,
        ];
    }
}