<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\request;
use App\Models\Categories;
class ProductController_old extends Controller
{
    public function index(){
        $categories = Categories::all();
        return view('products.index', ['categories'=>$categories]);
    }
    // public function getproduct(){
    //     return view('MyProducts');
    // }
    // public function getcall(){
    //     return view('CallUs');
    // }
    // public function getabout(){
    //     return view('AboutUs');
    // }
    // public function gethome(){
    //     return view('welcome');
    // }

    public function create(Request $request)
    {
        // print_r($_GET);
        // echo $request;
        dd($request);
        echo'<h2>this is from ProductsController.create';
        // $validate = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'description' => 'nullable|string|max:255'
        // ]);
        // $arr = [
        //     'name' => $request->name,
        //     'description' => $request->description
        // ];
        // $items = Categories::create($arr);
        // $items->save();

        // return redirect() -> route('categories.index');
    }
}
