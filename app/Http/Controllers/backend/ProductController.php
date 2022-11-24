<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("backend.product.addproduct");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->des = $request->des;
        $product->status = $request->status;
        $product->save();
        return redirect()->route("showproduct");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = Product::all();
        return view("backend.product.manage",compact("products"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Product::find($id);
        return view("backend.product.update", compact("edit"));
    }
    public function active($id)
    {
        $active = Product::find($id);
        $active->status=2;
        $active->update();
        return back();
    }
    public function inactive($id)
    {
        $inactive = Product::find($id);
        $inactive->status=1;
        $inactive->update();
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Product::find($id);
        $update->name = $request->name;
        $update->des = $request->des;
        $update->status = $request->status;
        $update->update();
        return redirect()->route("showproduct");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $delete = Product::find($id);
        $delete->delete();
        return back();
    }
}
