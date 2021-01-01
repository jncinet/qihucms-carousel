<h1 align="center">幻灯片广告管理</h1>

## 安装
```shell
composer require jncinet/qihucms-carousel
```

## 开始
### 数据迁移
```shell
$ php artisan migrate
```

### 发布资源
```shell
$ php artisan vendor:publish --provider="Qihucms\Carousel\CarouselServiceProvider"
```

### 后台菜单
+ 幻灯片广告位：`carousel/categories`
+ 幻灯片广告：`carousel/carousels`

## 使用

### 路由参数说明

#### 反馈列表
+ 请求方式 GET
+ 请求地址 `carousel/{uri=广告位标识}`
+ 返回值
```
{
    'id' => 1,
    'uri' => "广告位标识",
    'name' => "广告位名称",
    'carousels' => [
        {
            'id': 1,
            "title": "title",
            "url": "http://.../*.jpg",
            "img_src": "http://...",
            "alt": "abc",
        }
    ],
},
```

## 数据库

### 分类表：carousel_categories

| Field             | Type      | Length    | AllowNull | Default   | Comment       |
| :----             | :----     | :----     | :----     | :----     | :----         |
| id                | bigint    |           |           |           |               |
| uri               | varchar   | 255       |           |           | 广告位标识     |
| name              | varchar   | 255       |           |           | 广告位名称     |
| remark            | varchar   | 255       | Y         | NULL      | 广告位备注      |
| created_at        | timestamp |           | Y         | NULL      | 创建时间        |
| updated_at        | timestamp |           | Y         | NULL      | 更新时间        |

### 广告表：carousels

| Field             | Type      | Length    | AllowNull | Default   | Comment       |
| :----             | :----     | :----     | :----     | :----     | :----         |
| id                | bigint    |           |           |           |               |
| carousel_category_id | bigint |           |           |           | 广告位ID       |
| title             | varchar   | 255       |           |           | 广告标题       |
| url               | varchar   | 255       |           |           | 链接地址       |
| img_src           | varchar   | 255       | Y         | NULL      | 图片地址       |
| alt               | varchar   | 255       | Y         | NULL      | 描述           |
| remark            | varchar   | 255       | Y         | NULL      | 备注信息        |
| status            | tinyint   |           |           | 0         | 状态           |
| start_time        | timestamp |           | Y         | NULL      | 开始时间        |
| end_time          | timestamp |           | Y         | NULL      | 结束时间        |
| created_at        | timestamp |           | Y         | NULL      | 创建时间        |
| updated_at        | timestamp |           | Y         | NULL      | 更新时间        |
