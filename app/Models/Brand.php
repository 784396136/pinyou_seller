<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // 指定表
    protected $table = 'brand';
    
    // 获取所有
    public function getAll()
    {
        return Brand::get();
    }
}
