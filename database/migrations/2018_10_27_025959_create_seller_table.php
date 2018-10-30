<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->comment('用户名');
            $table->char('password',60)->comment('密码');
            $table->string('shop_name')->comment('店铺名称');
            $table->string('firm')->comment("公司名称");
            $table->bigInteger('office_tel')->comment("公司电话");
            $table->string('firm_address')->comment("公司地址");
            $table->string('contact')->comment("联系人姓名");
            $table->string('QQ')->comment("联系人QQ号");
            $table->string('contact_email')->comment("联系人邮箱");
            $table->string('bpn')->comment("营业执照号");
            $table->string('t_r_c_n')->comment("税务登记号");
            $table->string('oc')->comment("组织机构代码证");
            $table->string('lar')->comment("法定代表人");
            $table->string('lar_id')->comment("法定代表人身份证号");
            $table->string('name_bank')->comment("开户行名称");
            $table->string('bank_branch')->comment("开户行支行");
            $table->string('ank_account')->comment("银行账号");
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
        Schema::dropIfExists('seller');
    }
}
