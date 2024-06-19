<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\Images;
use App\Models\Comment;
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
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'img_url.*' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        $product = Product::create($validated);
        $product->ProductsForCategories()->sync($request->categories);

        if ($request->hasFile('img_url')) {
            $isFirstImage = true;

            foreach ($request->file('img_url') as $image) {
                // Store the image and get its path
                $path = $image->store('img_url', 'public');

                // Create an entry in the images table
                Images::create([
                    'product_id' => $product->id,
                    'img_url' => $path,
                    'is_thumbnail' => $isFirstImage,
                ]);

                $isFirstImage = false;
            }
        }

        return redirect('/Admin/Products')->with('success', 'Product Added Successfully!');
    }

    public function showProducts()
    {
        //Produktu izvade tabulā
        $products = Product::with('ProductsForCategories')->get();
        $categories = Categories::all();

        return view('admin/Products', compact('products', 'categories'));
    }

    public function showProductsBrowse(Request $request)
    {
        //Produktu izvade browse lapā
        $query = Product::with('thumbnailImages');

        // Filter by categories
        if ($request->filled('categories')) {
            $categories = $request->input('categories');
            $query->whereHas('ProductsForCategories', function ($q) use ($categories) {
                $q->whereIn('categories.id', $categories);
            });
        }

        // Filter by free products
        if ($request->filled('free')) {
            $query->where('Price', '=', '0.00');
        }

        // Fetch products based on filters
        $products = $query->get();

        $products = $query->paginate(10);

        // You can also load categories to display in the filter checkboxes
        $Categories = Categories::all();

        return view('Browse', compact('products', 'Categories'));
    }

    public function search(Request $request) {
        $search = $request->input('search');

        $products = Product::where('Title', 'like', '%' . $search . '%')->paginate(10);

        $Categories = Categories::all();

        return view('Browse', compact('products', 'search', 'Categories'));
    }

    public function showProductsDetail(Request $request)
    {
        //Produkta detalizētās lapas info izvade
        $productId = $request->query('id');
        $product = Product::with('images')->find($productId);

        $product->load('comments.user');

        $comments = $product->comments()->latest()->get();

        $positiveCount = $comments->where('sentiment', 'positive')->count();
        $negativeCount = $comments->where('sentiment', 'negative')->count();

        $sentimentMajority = ($positiveCount > $negativeCount) ? 'positive' : 'negative';

        return view('productPage', compact('product', 'comments', 'sentimentMajority'));
    }

    public function storeComment(Request $request)
    {
        $validated = $request->validate([
            'productId' => 'required|exists:products,id',
            'comment' => 'required|string',
            'sentiment' => 'required|in:positive,negative'
        ]);

        $comment = new Comment();
        $comment->product_id = $validated['productId'];
        $comment->user_id = auth()->id(); // Assuming you have user authentication
        $comment->comment = $validated['comment'];
        $comment->sentiment = $validated['sentiment'];

        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
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
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id'
        ]);

        $id = $request->input('id');
        $product = Product::findOrFail($id);
        $product->update([
            'Title' => $validated['Title'],
            'Summary' => $validated['Summary'],
            'Price' => $validated['Price'],
            'ReleaseDate' => $validated['ReleaseDate'],
            'Developer' => $validated['Developer'],
            'Publisher' => $validated['Publisher'],
        ]);

        $product->ProductsForCategories()->sync($validated['categories']);

        return redirect()->route('admin.Products')->with('success', 'Product has been succeesfully updated!');
    }
}
