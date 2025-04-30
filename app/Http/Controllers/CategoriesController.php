<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
class CategoriesController extends Controller
{
    public function index()
    {
        $get_items = categories::All(); //read statement same as select * from table
        return view("categories.index", ['categories' => $get_items]);
    }
    // Read
    public function create(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255'
        ]);
        $arr = [
            'name' => $request->name,
            'description' => $request->description
        ];
        $items = Categories::create($arr);
        $items->save();

        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        // Categories::where('id', $request->id)->delete();
        $data = Categories::find($id);
        if ($data) {
            $data->delete();
        }

        return redirect()->route('categories.index');

    }

    public function edit($id)
    {
        $data = Categories::find($id);
        return view("categories.edit", ['categories' => $data]);
    }

    public function update(Request $request)
    {
        $data = Categories::find($request->id);

        $data -> update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return redirect()->route('categories.index');
    }

}



