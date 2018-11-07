<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkuImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sku_image', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sku_id')->comment('SKU ID');
            $table->string('path')->comment('图片路径');
            $table->string('sm_path')->comment('小图片路径');
            $table->string('md_path')->comment('中图片路径');
            $table->string('bg_path')->comment('大图片路径');
            $table->index('sku_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sku_image');
    }
}
