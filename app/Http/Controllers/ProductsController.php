<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class ProductsController extends Controller
{
    public function index(){
        $categories = Categories::all();
        $products = Products::all();
        return view('products.index', ['categories'=>$categories, 'products'=>$products]);
    }

    public function create(Request $request){
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'categories_id' => 'required|integer',
            'image'=> 'nullable'
        ]);
        $arr = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'categories_id' => $request->categories_id,
            'image' => $request->image
        ];
        $items = Products::create($arr);
        $items->save();

        return redirect()->route('product.index');
    }

    public function delete($id){
        $data = Products::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('product.index');
    }

    public function edit($id){
        $product = Products::find($id);
        $ProductCategory = Categories::find($product -> categories_id);
        $categexcluded = Categories::all() -> except($product -> categories_id);
        return view('products.edit', ['products'=>$product, 'categexcluded' => $categexcluded, 'ProdCateg' => $ProductCategory]);
    }

    public function update(Request $request){

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'categories_id' => 'required|integer',
            'image'=> 'nullable'
        ]);
        
        $data = Products::find($request -> id);

        $data -> update([
            'name' => $request->name,
            'description' => $request->description,
            'stock' => $request->stock,
            'image' => $request->image,
            'price' => $request->price,
            'categories_id' => $request->categories_id
        ]);
        return redirect()->route('product.index');

    }
}
