<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function show()
    {
        //Kategoriju izvade tabulā
        $categories = Categories::all();

        return view('admin/Categories', ['categories' => $categories]);
    }

    public function update() {

    }

    public function delete(Request $request) {
        if($request->has('row=ids')) {
            $ids = $request->input('row=ids');

            Categories::whereIn('id', $ids)->delete();

            return redirect('/Admin/Categories')->with('success', 'Category / Categories deleted Successfully!');

        } else {

            return redirect('/Admin/Categories')->with('fail', 'Category / Categories have no been selected!');
        }
    }

    public function store(Request $request) {
       //Produktu pievienošanas metode
        $validated = $request->validate([
            'name' => 'required'
        ]);

        $categories = Categories::create($validated);

        return redirect('/Admin/Categories')->with('success', 'Category Added Successfully!'); 
    }
}
