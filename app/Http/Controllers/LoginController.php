<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class LoginController extends Controller
{
    // 登录
    public function login()
    {
        return view("shoplogin");
    }

    public function dologin(Request $req)
    {
        $data = $req->all();
        $model = new Login;
        $res = $model->doLogin($data);
        if($res==1)
        {
            return redirect()->route('login')->with('error', '您的账号还未激活!')->withInput();
        }
        elseif($res==2)
        {
            return redirect()->route('login')->with('error', '账号不存在!')->withInput();
        }
        elseif($res==3)
        {
            return redirect()->route('index');
        }
        elseif($res==4)
        {
            return redirect()->route('login')->with('error', '密码错误!')->withInput();
        }
    }
}
