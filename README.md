**幻灯片广告管理**

安装扩展包：composer require jncinet/laravel-carousel

数据库迁移：php artisan migrate

获取链接：route('api.carousel.index');

API接口地址：carousel/carousels/{uri}

（uri：对应后台添加的广告位标识）

后台管理地址：

广告位：carousel/categories

广告：carousel/carousels