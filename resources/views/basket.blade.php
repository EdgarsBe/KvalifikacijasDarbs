@extends('layouts.app')
@section("content")

    <h1 class="text-white m-10 mt-4">Shopping Cart</h1>
    <div class="flex justify-between">
        <div class="text-white w-1/2 m-8 flex flex-col">
            @if ($cart && $cart->cartItems->isEmpty())
                <p>Your cart is empty.</p>
            @elseif ($cart)
                <div class="flex justify-between pb-4 m-2 border-b-primary-900 border-b-2">
                    <div>
                        <p>Item</p>
                    </div>
                    <div>
                        <p>Price</p>
                    </div>
                </div>
                <div class="h-96 overflow-auto scrollable-box">
                    @foreach ($cart->cartItems as $cartItem)
                    <div class="bg-primary-900 hover:bg-primary-950 transition-color duration-500 flex m-2 border-2 border-primary-800">
                        @php
                            $thumbnail = $cartItem->product->images->firstWhere('is_thumbnail', true);
                        @endphp
                        <img class="w-32 border-r-2 border-primary-800" src="{{ asset('storage/' . $thumbnail->img_url) }}">
                        <div class="flex justify-between w-full">
                            <h4 class="ml-2">{{ $cartItem->product->Title }}</h4>
                        </div>
                        <div class="flex flex-col w-16 justify-between items-end mr-2">
                            <div class="flex">
                                <p>€</p>
                                <p>{{ $cartItem->product->Price }}</p>
                            </div>
                            <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                                @csrf
                                <button type="submit">
                                    <ion-icon class="" name="trash-outline"></ion-icon>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
        <div class=" w-1/4 m-6 mt-4 text-white">
            <p class="text-3xl m-4 border-b-2 pb-4">Summary</p>
            <div class="flex justify-between m-4 my-10 border-b-2 pb-10">
                <p class="text-lg">Subtotal:</p>
                <p>€ {{ $cart->total_price }}</p>
            </div>
            <div class="flex justify-between m-4 my-10 pb-10">
                <p class="text-2xl">Estimated Total:</p>
                <p>€ {{ $cart->total_price }}</p>
            </div>
            <!-- <a href="{{ url('/Basket/Checkout/') }}"> -->
            <form action="Basket/Checkout/Order/Processing" method="POST">
                 @csrf
                <button class="w-full p-4 border-2 border-primary-900 hover:border-border-purple transition-colors duration-500" type="submit">Go to Checkout</button>
            </form>
            <!-- </a>     -->
        </div>
        @endif
    </div>
@endsection
