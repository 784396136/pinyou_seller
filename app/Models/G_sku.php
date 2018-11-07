<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\S_img;
use Image;


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
        $model -> save();
        // 获取新插入ID
        $sku_id = DB::getPdo()->lastInsertId();
        foreach($data['image'] as $v)
        {
            if($v->isValid())
            {
                $s_img = new S_img;
                $admin_path = base_path('../laravel-admin/public/uploads/sku_img/'.date("Ymd"));
                $img= [];
                $img['path'] = '/uploads/'.$v->store('/sku_img/'.date("Ymd"));
                // 获取上传图片路径
                $old_path = $v->path();
                $t_path = public_path('/uploads/sku_img/'.date("Ymd").'/thumbnails');
                // 创建缩略图图片路径
                if(!is_dir($t_path))
                {
                    mkdir($t_path.'/800/',0777,true);
                    mkdir($t_path.'/400/',0777,true);
                    mkdir($t_path.'/56/',0777,true);
                }
                if(!is_dir($admin_path))
                {
                    mkdir($admin_path,0777,true);
                    mkdir($admin_path.'/thumbnails/800/',0777,true);
                    mkdir($admin_path.'/thumbnails/400/',0777,true);
                    mkdir($admin_path.'/thumbnails/56/',0777,true);
                }
                // 获取上传图片名称
                $name = substr(strrchr($img['path'],'/'),1);
                // 拼出不同大小的图片名
                $sm_name = 'sm_'.$name;
                $md_name = 'md_'.$name;
                $bg_name = 'bg_'.$name;

                // 处理图片
                $image = Image::make($old_path);
                $image->save($admin_path.'/'.$name);
                // 生成缩略图
                // 大图
                $image->resize(800,800);
                $image->save($t_path.'/800/'.$bg_name);
                $image->save($admin_path.'/thumbnails/800/'.$bg_name);
                $img['bg_path'] = '/uploads/sku_img/'.date('Ymd').'/'.$bg_name;
                // 中图
                $image->resize(400,400);
                $image->save($t_path.'/400/'.$md_name);
                $image->save($admin_path.'/thumbnails/400/'.$md_name);
                $img['md_path'] = '/uploads/sku_img/'.date('Ymd').'/'.$md_name;
                // 小图
                $image->resize(56,56);
                $image->save($t_path.'/56/'.$sm_name);
                $image->save($admin_path.'/thumbnails/56/'.$sm_name);
                $img['sm_path'] = '/uploads/sku_img/'.date('Ymd').'/'.$sm_name;
                $img['sku_id'] = $sku_id;
                $s_img -> fill($img);
                $s_img -> save();
            }
        }
    }
}
