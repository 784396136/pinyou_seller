<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class G_sku extends Model
{
    // 指定表
    protected $table = 'goods_sku';
    // 白名单
    protected $fillable = ['goods_id','sku_name','stock','price','attr'];
    // 不更新时间
    public $timestamps = false;

    // 获取属性
    public function getAttr($id)
    {
        $data = DB::table('goods_attr_name as an')
                ->select('an.id as n_id','an.attr_name',DB::raw("GROUP_CONCAT(you_av.id) as id_list"),DB::raw("GROUP_CONCAT(you_av.attr_value) as value_list"))
                ->leftJoin('goods_attr_value as av','an.id','av.name_id')
                ->where('an.goods_id',$id)
                ->groupBy('an.attr_name')
                ->get();
        foreach($data as $v)
        {
            $v->id_list = explode(',',$v->id_list);
            $v->value_list = explode(',',$v->value_list);
        }
        return $data;
    }

    // 获取属性
    public function getAll($id)
    {
        $data = G_sku::where('goods_id',$id)->get();
        return $data;
    }

    // 添加
    public function addSku($data)
    {
        $model = new self;
        $model -> fill($data);
        return $model -> save();
    }
}
