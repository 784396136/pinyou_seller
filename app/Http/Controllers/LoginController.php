<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // 登录
    public function login()
    {
        return view("shoplogin");
    }
}