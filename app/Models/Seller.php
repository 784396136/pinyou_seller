<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Seller extends Model
{
    // 指定表名
    protected $table = 'seller';

    // 设置白名单
    protected $fillable = ['username','password','shop_name','firm','office_tel','firm_address','contact','QQ','contact_email','bpn','t_r_c_n','oc','lar','lar_id','name_bank','bank_branch','ank_account','introduce','cell_phone'];

    // 添加到表中
    public function add($data)
    {
        $data['password'] = Hash::make($data['password']);
        $model = new Seller;
        $model->fill($data);
        $model->save();
    }
}
