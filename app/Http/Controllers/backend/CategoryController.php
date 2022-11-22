<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function creat(){
        return view("backend.category.add");
    }
    
    public function insert(Request $rqst){
        $cat = new Category;
        $cat->name = $rqst->name;
        $cat->des = $rqst->des;
        $cat->code = $rqst->code;
        $cat->status = $rqst->status;
        $cat->save();
    
        return response()->json([
            "status"=>"200"
        ]);
    }
    
    public function show(){
        $categories=Category::all();
        return response()->json([
            "status"=>"200",
            "data"=>$categories
        ]);
    } 
}
