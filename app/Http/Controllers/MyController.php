<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
   function abm(){
    return view("showkat");
   }
   function abc(){
    return view("welcome");
   }
}
