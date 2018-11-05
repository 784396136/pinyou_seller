<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // 指定表
    protected $table = 'category';

    // 三级联动
    public function getParent($parent_id=0)
    {
        $data = Category::where('parent_id',$parent_id)->get();
        return $data;
    }
}
