<?php

// 登录
Route::get('/login',"LoginController@login")->name('login');
// 注册
Route::get('/register',"LoginController@register")->name('register');


// 主页
Route::get('/',"IndexController@index")->name('index');

// 首页
Route::get('/home',"IndexController@home")->name('home');

// 基本管理
Route::get('/basic/seller',"BasicController@seller")->name('basicSeller'); // 修改资料
Route::get('/basic/pwd',"BasicController@pwd")->name('basicPwd'); // 修改密码

// 商品管理
Route::get('/goods/add',"GoodsController@add")->name('goodsAdd'); // 新增商品
Route::get('/goods/goods',"GoodsController@goods")->name('goods'); // 商品管理
