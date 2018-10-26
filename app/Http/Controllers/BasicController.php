<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicController extends Controller
{
    // 修改资料
    public function seller()
    {
        return view('admin.seller');
    }

    // 修改密码
    public function pwd()
    {
        return view('admin.password');
    }
    
}
