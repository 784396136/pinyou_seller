<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // 三级联动
    public function getParent(Request $req)
    {
        $r = $req->all();
        $id = $r['id'];
        $model = new Category;
        $data = $model->getParent($id);
        echo json_encode($data);
    }
}
