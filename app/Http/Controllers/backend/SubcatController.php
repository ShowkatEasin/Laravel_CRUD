<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Models\Backend\SubCat;
use Image;
use File;

class SubcatController extends Controller
{
    public function index(){
        $cats = Category::all();
        return view("backend/subcat/add", compact("cats"));
    }

    public function add(Request $rqst){
       
        if($rqst->pic){
            $image = $rqst->file('pic');
            $customName = rand().".".$image->getClientOriginalExtension();
            $location = public_path('backend/subcatimage/'.$customName);
            Image::make($image)->save($location);
        }
        $subcat = new SubCat;
        $subcat->cat_id = $rqst->cat_id;
        $subcat->name = $rqst->name;
        $subcat->des = $rqst->des;
        $subcat->image = $customName;
        $subcat->status = $rqst->status;
        $subcat->save();
        // dd($subcat);
        return redirect()->route("showsubcat");
    }

    public function show(){
        $SubCats = SubCat::all();
        return view("backend.subcat.manage",compact("SubCats"));
    }

    public function findData($id){
        $SubCats = SubCat::find($id);
        $cats = Category::all();
        return view("backend.subcat.edit",compact("SubCats","cats"));
    }

    public function delete($id){
        $delete = SubCat::find($id);
        if(File::exists("backend/subcatimage/".$delete->image)){
            File::delete("backend/subcatimage/".$delete->image);
        }
        $delete->delete();
        return back();
    }
    public function update(Request $rqst, $id){
        $subcat = SubCat::find($id);
        if($rqst->pic){
            if(File::exists("backend/subcatimage/".$subcat->image)){
                File::delete("backend/subcatimage/".$subcat->image);
                $image = $rqst->file('pic');
                $customName = rand().".".$image->getClientOriginalExtension();
                $location = public_path('backend/subcatimage/'.$customName);
                Image::make($image)->save($location);
                $subcat->image = $customName;
            }
        }
        $subcat->cat_id = $rqst->cat_id;
        $subcat->name = $rqst->name;
        $subcat->des = $rqst->des;
        $subcat->status = $rqst->status;
        $subcat->update();
        return redirect()->route("showsubcat");
    }

}
