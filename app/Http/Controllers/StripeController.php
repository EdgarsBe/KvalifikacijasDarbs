<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Cart;

class StripeController extends Controller
{
    public function index(){
        return view('checkout');
    }

    public function checkout(){

        Stripe::setApiKey(config('stripe.sk'));


        $cart = Cart::where('user_id', Auth::id())->with('cartItems.product.images')->first();
        $lineItems = [];
        $cartId = $cart->id;
        $userId = Auth::id();

        foreach ($cart->cartItems as $cartItem) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $cartItem->product->Title,
                    ],
                    'unit_amount' => $cartItem->product->Price * 100, // Amount in cents
                ],
                'quantity' => 1,
                
            ];
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'metadata' => [
                'user_id' => $userId,
                'cart_id' => $cartId,
            ],
            'line_items' => [$lineItems],
            'mode' => 'payment',
            'success_url' => route('order.success'),
            'cancel_url' => route('order.index'),
        ]);

        return redirect()->away($session->url);
    }

    public function success(){
        return view('success');
    }
}
