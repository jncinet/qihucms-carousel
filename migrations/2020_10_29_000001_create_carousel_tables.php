<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarouselTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousel_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uri', 100)->comment('广告位标识');
            $table->string('name', 100)->comment('广告位名称');
            $table->string('remark')->nullable()->comment('广告位备注');
            $table->timestamps();
        });

        Schema::create('carousels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('carousel_category_id')->comment('广告位ID');
            $table->string('title')->comment('广告标题');
            $table->string('url')->comment('链接地址');
            $table->string('img_src')->nullable()->comment('图片地址');
            $table->string('alt')->nullable()->comment('描述');
            $table->string('remark')->nullable()->comment('备注信息');
            $table->boolean('status')->default(0)->comment('状态');
            $table->timestamp('start_time')->nullable()->comment('开始时间');
            $table->timestamp('end_time')->nullable()->comment('结束时间');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carousel_categories');
        Schema::dropIfExists('carousels');
    }
}
