<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    // 显示主页
    public function index()
    {
        return view("admin.index");
    }

    // home页
    public function home()
    {
        return view("admin.home");
    }
}
