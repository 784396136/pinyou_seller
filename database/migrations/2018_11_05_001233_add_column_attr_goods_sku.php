<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnAttrGoodsSku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goods_sku', function (Blueprint $table) {
            $table->string('attr')->comment('属性');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods_sku', function (Blueprint $table) {
            //
            $table->dropColumn('attr');
        });
    }
}
