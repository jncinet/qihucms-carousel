<?php

use Illuminate\Routing\Router;

// 接口
Route::group([
    'prefix' => 'carousel',
    'namespace' => 'Qihucms\Carousel\Controllers\Api',
    'middleware' => ['api'],
], function (Router $router) {
    $router->get('carousels/{uri}', 'CarouselController@index')->name('api.carousel.index');
});

// 后台管理
Route::group([
    'prefix' => config('admin.route.prefix') . '/carousel',
    'namespace' => 'Qihucms\Carousel\Controllers\Admin',
    'middleware' => config('admin.route.middleware'),
    'as' => 'admin.'
], function (Router $router) {
    // 广告位
    $router->resource('categories', 'CategoryController');
    // 广告
    $router->resource('carousels', 'CarouselController');
});