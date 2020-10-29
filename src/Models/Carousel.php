<?php

namespace Qihucms\Carousel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carousel extends Model
{
    protected $fillable = [
        'carousel_category_id', 'title', 'url', 'img_src', 'alt', 'remark', 'status',
        'start_time', 'end_time'
    ];

    /**
     * @return BelongsTo
     */
    public function category() : BelongsTo
    {
        return $this->belongsTo('Qihucms\Carousel\Models\CarouselCategory', 'carousel_category_id');
    }
}
