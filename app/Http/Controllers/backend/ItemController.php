<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Item;
use App\Models\Backend\Gallary;
use Image;
use File;
class ItemController extends Controller
{
    public function index(){
        return view('backend/item/add');
    }

    public function insert(Request $rqst){
        $item = new Item();
        if($rqst->pic){
            $image = $rqst->file('pic');
            $itemImageCustomName = rand().".".$image->getClientOriginalExtension();
            $location = public_path('backend/items/'.$itemImageCustomName);
            Image::make($image)->save($location);
            $item->image = $itemImageCustomName;
        }
        $item->name = $rqst->name;
        $item->status = $rqst->status;
        $item->save();
        $findId = Item::all()->last();

        if($rqst->galleries){
            
            $galleryImages = $rqst->file('galleries');
            foreach($galleryImages as $galleryImage){
                $galleryImageCustomName = rand().".".$galleryImage->getClientOriginalExtension();
                $galleryLocation = public_path('backend/items/gallery/'.$galleryImageCustomName);
                Image::make($galleryImage)->save($galleryLocation);
                $gallery = new Gallary;
                $gallery->item_id = $findId->id;
                $gallery->galleries_image = $galleryImageCustomName;
                $gallery->save();
            }
        }
        return redirect()->route("showitem");
    }
    function show(){
        $items = Item::all();
        return view("backend.item.manage", compact("items"));
    }
    function addnewGallery(Request $rqst, $id){
        $galleryImages = $rqst->file('galleries');
        foreach($galleryImages as $galleryImage){
            $galleryImageCustomName = rand().".".$galleryImage->getClientOriginalExtension();
            $galleryLocation = public_path('backend/items/gallery/'.$galleryImageCustomName);
            Image::make($galleryImage)->save($galleryLocation);
            $gallery = new Gallary;
            $gallery->item_id = $id;
            $gallery->galleries_image = $galleryImageCustomName;
            $gallery->save();
        }
        return back();
    }
    function edit($id){
        $item = Item::find($id);
        $images =Gallary::where('item_id',$id)->get();
        return view("backend.item.edit", compact("item","images"));
    }
    function deleteGallery($id){
        $images =Gallary::find($id);
        if(File::exists("backend/items/gallery/".$images->galleries_image)){
            File::delete("backend/items/gallery/".$images->galleries_image);
        }
        $images->delete();
        return back();
    }













}
