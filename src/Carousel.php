<?php

namespace Qihucms\Carousel;

use Qihucms\Carousel\Models\CarouselCategory;

class Carousel
{
    public function getCarouselByUri(string $uri)
    {
        $category = CarouselCategory::where('uri', $uri)->with(['carousel' => function ($query) {
            $query->where('status', 1)
                ->where('start_time', '<', now())
                ->where('end_time', '>', now())
                ->orderBy('id', 'desc');
        }])->firstOrFail();
        return $category->carousel;
    }
}