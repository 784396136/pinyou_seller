<?php

// 测试
Route::get("/test","TestController@test")->name('test');
Route::get("/get","TestController@get")->name('get');

// 登录
Route::get('/login',"LoginController@login")->name('login');
Route::post('/login',"LoginController@dologin")->name('dologin');
// 注册
Route::get('/register',"RegisterController@register")->name('register');
Route::post('/register',"RegisterController@doregister")->name('doregister');
// 入驻协议
Route::get('/protocol',"RegisterController@protocol")->name('protocol');   

// 添加登录中间件
Route::middleware(['login'])->group(function(){
    // 三级联动
    Route::get('/category/getparent',"CategoryController@getParent")->name('getParent');

    // 主页
    Route::get('/',"IndexController@index")->name('index');

    // 首页
    Route::get('/home',"IndexController@home")->name('home');

    // 基本管理
    Route::get('/basic/seller',"BasicController@seller")->name('basicSeller'); // 修改资料
    Route::get('/basic/pwd',"BasicController@pwd")->name('basicPwd'); // 修改密码

    // 商品管理
    Route::get('/goods/add',"GoodsController@add")->name('goodsAdd'); // 新增商品
    Route::post('/goods/add',"GoodsController@doadd")->name('goodsDoAdd'); // 新增商品
    Route::get('/goods/goods',"GoodsController@goods")->name('goods'); // 商品管理
    Route::get('/goods/sku/{id}',"GoodsController@sku")->name('goodsSku'); // 添加SKU
    Route::post('/goods/sku/{id}',"GoodsController@dosku")->name('goodsDoSku'); // 添加SKU
});

