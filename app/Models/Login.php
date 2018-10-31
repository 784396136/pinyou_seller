<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Login extends Model
{
    // 指定表名
    protected $table = 'seller';

    public function doLogin($data)
    {
        $name = $data['username'];
        $res = Login::where('username',$name)->first();
        if($res)
        {
            if($res->status==0)
            {
                return 1;
            }
            else
            {
                if(Hash::check($data['password'],$res->password))
                {
                    session([
                       'seller_id'=>$res->id,
                       'seller_name'=>$res->username 
                    ]);
                    return 3;
                }
                else
                {
                    return 4;
                }
            }
                
        }
        else
        {
            return 2;   
        }
    }
}
