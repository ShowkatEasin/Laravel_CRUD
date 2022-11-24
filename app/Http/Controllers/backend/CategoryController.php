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
    public function delete($id){
        $categories=Category::find($id);
        $categories->delete();
        if($categories){
            return response()->json([
                "status"=>"200"
            ]);
        }
        else{
            return response()->json([
                "status"=>"404"
            ]);
        }
    }

    public function edit($id){
        $categorie=Category::find($id);
        if($categorie){
            return response()->json([
                "status"=>"200",
                "data"=>$categorie
            ]);
        }
        else{
            return response()->json([
                "status"=>"404"
            ]);
        }
    }
    public function update(Request $rqst, $id){
        $cat = Category::find($id);
        $cat->name = $rqst->name;
        $cat->des = $rqst->des;
        $cat->code = $rqst->code;
        $cat->status = $rqst->status;
        $cat->update();
        if($cat){
            return response()->json([
                "status"=>"200"
            ]);
        }
        else{
            return response()->json([
                "status"=>"404"
            ]);
        }
    }

    public function active($id){
        $cat = Category::find($id);
        $cat->status = 2;
        $cat->update();
        if($cat){
            return response()->json([
                "status"=>"200"
            ]);
        }
        else{
            return response()->json([
                "status"=>"404"
            ]);
        }
    }

    public function inactive($id){
        $cat = Category::find($id);
        $cat->status = 1;
        $cat->update();
        if($cat){
            return response()->json([
                "status"=>"200"
            ]);
        }
        else{
            return response()->json([
                "status"=>"404"
            ]);
        }
    }
}
