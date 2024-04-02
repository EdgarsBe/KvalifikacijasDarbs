<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function store(Request $request)
    {
        //Produktu pievienošanas metode

        $validated = $request->validate([
            'Title' => 'required',
            'Summary' => 'required',
            'Price' => 'required|min:0',
            'ReleaseDate' => 'required|date',
            'Developer' => 'required',
            'Publisher' => 'required',
        ]);
        Product::create($validated);

        return redirect('/Admin/Products')->with('success', 'Product Added Successfully!');
    }

    public function showProducts()
    {
        //Produktu izvade tabulā
        $products = Product::all();

        return view('admin/Products', ['products' => $products]);
    }

    public function showProductsBrowse()
    {
        //Produktu izvade browse lapā
        $products = Product::all();

        return view('Browse', ['products' => $products]);
    }

    public function showProductsDetail(Request $request)
    {
        //Produkta detalizētās lapas info izvade
        $productId = $request->query('id');
        $product = Product::find($productId);

        return view('productPage', ['product' => $product]);
    }

    public function deleteProducts(Request $request)
    {
        if($request->has('row=ids')) {
            $ids = $request->input('row=ids');

            Product::whereIn('id', $ids)->delete();

            return redirect('/Admin/Products')->with('success', 'Product / Products deleted Successfully!');

        } else {

            return redirect('/Admin/Products')->with('fail', 'Product / Products have no been selected!');
        }
    }

    public function updateProducts(Request $request)
    {
        $validated = $request->validate([
            'Title' => 'required',
            'Summary' => 'required',
            'Price' => 'required|min:0',
            'ReleaseDate' => 'required|date',
            'Developer' => 'required',
            'Publisher' => 'required',
        ]);

        $id = $request->input('id');
        $validated = Product::findOrFail($id);
        $validated->update($request->all());

        return redirect()->route('admin.Products')->with('success', 'Product has been succeesfully updated!');
    }
}
