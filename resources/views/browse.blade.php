@extends('layouts.app')
@section("content")
    <div>
        <div>
            @foreach($products as $product)
                <a href={{ route('productPage', ['id' => $product->id ]) }}>
                    <div>
                        <img src="#"/>
                        <div>
                            <h2>{{ $product->Title }}</h2>
                            <p>{{ $product->Price }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
