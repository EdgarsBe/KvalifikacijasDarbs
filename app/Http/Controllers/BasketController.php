<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItems;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller {

    public function remove($itemId) {

        $cartItem = CartItems::find($itemId);

        if($cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('cart.show')->with('success', 'Product removed from cart.');
    }

    public function show()
    {
        $cart = Cart::where('user_id', Auth::id())->with('cartItems.product.images')->first();
        return view('basket', compact('cart'));
    }
    
    public function add(Request $request, $productId) {

        $product = Product::find($productId);

        if(!$product) {
            return redirect()->route('productPage', ['id' => $productId])->with('error', 'Product not Found.');
        }

        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $cartItem = CartItems::where('cart_id', $cart->id)->where('product_id', $productId)->first();

        if($cartItem) {
            return redirect()->route('productPage', ['id' => $productId])->with('error', 'Product already in basket.');
        } else {
            $cartItem = new CartItems();
            $cartItem->cart_id = $cart->id;
            $cartItem->product_id = $productId;
        }

        $cartItem->save();

        return redirect()->route('productPage', ['id' => $productId])->with('success', 'Product added to cart.');
    }
}