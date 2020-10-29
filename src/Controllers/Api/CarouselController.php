<?php

namespace Qihucms\Carousel\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use Qihucms\Carousel\Carousel;

class CarouselController extends ApiController
{
    protected $carousel;

    public function __construct(Carousel $carousel)
    {
        $this->carousel = $carousel;
    }

    /**
     * 根据标识读取广告列表
     *
     * @param $uri
     * @return mixed
     */
    public function index($uri)
    {
        return $this->carousel->getCarouselByUri($uri);
    }
}