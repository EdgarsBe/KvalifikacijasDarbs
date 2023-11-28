<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function store(Request $request) {
        //Validācija priekš laukiem
        
        $validated = $request->validate([
            'Title' => 'required',
            'Summary' => 'required',
            'Price' => 'required|min:0',
            'ReleaseDate' => 'required|date',
            'Developer' => 'required',
            'Publisher' => 'required',
        ]);

        Products::create($validated);

            // 'Title' => $request->input('Title'),
            // 'Summary' => $request->input('Summary'),
            // 'Price' => $request->input('Price'),
            // 'ReleaseDate' => $request->input('ReleaseDate'),
            // 'Developer' => $request->input('Developer'),
            // 'Publisher' => $request->input('Publisher'),
        // ]);

        
        return redirect('/Admin')->with('success', 'Product Added Successfully!');
    }
}
