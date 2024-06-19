@extends('layouts.app')
@section("content")

    <form action="Checkout/Order/Processing" method="POST">
        @csrf
        <button type="submit">Checkout</button>
    </form>

@endsection