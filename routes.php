<?php

use Illuminate\Routing\Router;

// 接口
Route::group([
    'namespace' => 'Qihucms\Carousel\Controllers\Api',
    'middleware' => ['api'],
], function (Router $router) {
    $router->get(config('qihu.carousel_prefix', 'carousel') . '/{uri}', 'CarouselController@index')->name('carousel.uri');
});

// 后台管理
Route::group([
    'prefix' => config('admin.route.prefix') . '/carousel',
    'namespace' => 'Qihucms\Carousel\Controllers\Admin',
    'middleware' => config('admin.route.middleware'),
    'as' => 'admin.carousel.'
], function (Router $router) {
    // 广告位
    $router->resource('categories', 'CategoryController');
    // 广告
    $router->resource('carousels', 'CarouselController');
});