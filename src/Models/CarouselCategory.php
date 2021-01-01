<?php

namespace Qihucms\Carousel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarouselCategory extends Model
{
    protected $fillable = ['uri', 'name', 'remark'];

    /**
     * @return HasMany
     */
    public function carousels() : HasMany
    {
        return $this->hasMany('Qihucms\Carousel\Models\Carousel');
    }
}
