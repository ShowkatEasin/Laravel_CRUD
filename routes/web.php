<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcatController;
use App\Http\Controllers\Backend\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/abm','App\Http\Controllers\MyController@abm')->name("abm");
Route::get('/abc',[MyController::class,'abc'])->name("abc");

Route::get('/product',[ProductController::class,'index'])->name("product");

Route::post('/addproduct',[ProductController::class,'insert'])->name("addproduct");

Route::get('/showproduct',[ProductController::class,'show'])->name("showproduct");

Route::get('/delete/{id}',[ProductController::class,'delete'])->name("delete");

Route::get('/edit/{id}',[ProductController::class,'edit'])->name("edit");

Route::get('/update/{id}',[ProductController::class,'update'])->name("update");

Route::get('/active/{id}',[ProductController::class,'active'])->name("active");

Route::get('/inactive/{id}',[ProductController::class,'inactive'])->name("inactive");

Route::get('/category',[CategoryController::class,'creat'])->name("category");

Route::post('/addcategory',[CategoryController::class,'insert']);

Route::get('/showcategory',[CategoryController::class,'show']);

Route::get('/deletecategory/{id}',[CategoryController::class,'delete']);

Route::get('/editcategory/{id}',[CategoryController::class,'edit']);

Route::get('/subcat',[SubcatController::class,'index'])->name("subcat");
Route::post('/addsubcat',[SubcatController::class,'add'])->name("addsubcat");
Route::get('/showsubcat',[SubcatController::class,'show'])->name("showsubcat");

Route::get('/deletesubcat/{id}',[SubcatController::class,'delete'])->name("deletesubcat");
Route::get('/editsubcat/{id}',[SubcatController::class,'findData'])->name("editsubcat");

Route::post('/updatesubcat/{id}',[SubcatController::class,'update'])->name("updatesubcat");


Route::get('/additem',[ItemController::class,'index'])->name("additem");
Route::post('/insertitem',[ItemController::class,'insert'])->name("insertitem");
Route::get('/showitem',[ItemController::class,'show'])->name("showitem");
Route::get('/edititem/{id}',[ItemController::class,'edit'])->name("edititem");
Route::get('/deletegallery/{id}',[ItemController::class,'deleteGallery'])->name("deletegallery");

Route::post('/addnewGallery/{id}',[ItemController::class,'addnewGallery'])->name("addnewGallery");




