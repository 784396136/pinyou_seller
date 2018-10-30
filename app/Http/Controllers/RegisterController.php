<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    // 入驻协议
    public function protocol()
    {
        return view("sampling");
    }

    // 注册
    public function register()
    {
        return view("register");
    }

    public function doregister(RegisterRequest $req)
    {
        // $redis = new \Predis\Client(['scheme' => 'tcp','host'=> '127.0.0.1','port'=> 6379]);
        // $valeue = json_encode($req->all());
        // $key = "seller:{$req->username}";
        // $redis->setex($key,-1,$valeue);

        $model = new \App\Models\Seller;
        $model->add($req->all());
    }
}
