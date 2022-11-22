<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/abm','App\Http\Controllers\MyController@abm')->name("abm");
Route::get('/abc',[MyController::class,'abc'])->name("abc");
Route::get('/product',[ProductController::class,'index'])->name("product");
Route::post('/addproduct',[ProductController::class,'insert'])->name("addproduct");
Route::get('/showproduct',[ProductController::class,'show'])->name("showproduct");
Route::get('/showproduct',[ProductController::class,'show'])->name("showproduct");
Route::get('/delete/{id}',[ProductController::class,'delete'])->name("delete");
Route::get('/edit/{id}',[ProductController::class,'edit'])->name("edit");
Route::post('/update/{id}',[ProductController::class,'update'])->name("update");
Route::get('/active/{id}',[ProductController::class,'active'])->name("active");
Route::get('/inactive/{id}',[ProductController::class,'inactive'])->name("inactive");
Route::get('/category',[CategoryController::class,'creat'])->name("category");
Route::post('/addcategory',[CategoryController::class,'insert']);
Route::get('/showcategory',[CategoryController::class,'show']);

