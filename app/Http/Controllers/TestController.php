<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $req)
    {
        // 获取url地址
        // dd($req->path());
        $redis = new \Predis\Client(['scheme' => 'tcp','host'=> '127.0.0.1','port'=> 6379]);
        $value = json_encode([
            'email'=> '123',
            'pwd'=>'qwer',
        ]);
        $key = "seller:123";
        $redis->setex($key,300,$value);
    }

    public function get()
    {
        dd(env('DB_DATABASE'));
        $redis = new \Predis\Client(['scheme' => 'tcp','host'=> '127.0.0.1','port'=> 6379]);
        $key = "seller:123";
        $data = $redis->get($key);
        $data = json_decode($data);
        dd($data);        
    }
}
