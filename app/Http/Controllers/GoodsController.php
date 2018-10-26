<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodsController extends Controller
{
    // 新增商品
    public function add()
    {
        return view("admin.goods_add");
    }

    // 管理商品
    public function goods()
    {
        return view("admin.goods");
    }
}
