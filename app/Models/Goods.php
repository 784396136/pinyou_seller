<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use DB;

class Goods extends Model 
{
    // 指定表
    protected $table = 'goods';
    // 设置白名单
    protected $fillable  = ['goods_name','subtitle','logo','thumbnails','content','brand_id','cat1','cat2','cat3','seller_id'];

    // 获取所有
    public function getAll()
    {
        $data = Goods::get();
        foreach($data as $k=>$v)
        {
            $v->cat1 = Category::select('cat_name')->where('id',$v->cat1)->first();
            $v->cat2 = Category::select('cat_name')->where('id',$v->cat2)->first();
            $v->cat3 = Category::select('cat_name')->where('id',$v->cat3)->first();
        }

        return $data;
    }
}
