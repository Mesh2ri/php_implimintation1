<?php

namespace App\Http\Controllers;

use Illuminate\Http\request;

class ProductController extends Controller
{
    public function getproduct(){
        return view('MyProducts');
    }
    public function getcall(){
        return view('CallUs');
    }
    public function getabout(){
        return view('AboutUs');
    }
    public function gethome(){
        return view('welcome');
    }
}
