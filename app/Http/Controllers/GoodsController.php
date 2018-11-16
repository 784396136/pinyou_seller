<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\models\Goods;
use App\Models\G_sku;

class GoodsController extends Controller
{
    // 新增商品
    public function add()
    {
        $category =  new Category;
        $cat = $category->getParent();
        $brand = new Brand;
        $b = $brand->getAll();
        
        return view("admin.goods_add",[
            'category' => $cat,
            'brand'=>$b
        ]);
    }

    // 新增sku
    public function sku($id)
    {
        $g_sku = new G_sku;
        $data = $g_sku->getAttr($id);
        $sku = $g_sku->getAll($id);
        return view("admin.goods_sku",[
            'id'=>$id,
            'data'=>$data,
            'sku'=>$sku
        ]); 
    }

    public function dosku(Request $req,$id)
    {
        
        $g_sku = new G_sku;
        $data = $req->all();
        $attr = $data;
        unset($attr['_token'],$attr['sku_name'],$attr['price'],$attr['stock'],$attr['image']);
        $num = count($attr)/2;
        $res = '';
        for($i=0;$i<$num;$i++) 
        {
            unset($data['attr_name'.$i],$data['attr_value'.$i]);
            if($i==0)
            {
                $res .= $attr['attr_name'.$i].':'.$attr['attr_value'.$i];
            }
            else
            {
                $res .= ','.$attr['attr_name'.$i].':'.$attr['attr_value'.$i];
            }
        }
        $data['attr'] = $res;
        $data['goods_id'] = $id;
        $g_sku -> addSku($data);
        return redirect()->route('goods');
    }

    public function doadd(Request $req)
    {
        $data = $req->all();
        $model = new Goods;
        $model->add($data);
        dd($req->all());
    }

    // 管理商品
    public function goods()  
    {
        $model = new Goods;
        $data = $model->getAll();
        return view("admin.goods",[
            'data'=>$data
        ]);
    }
}
