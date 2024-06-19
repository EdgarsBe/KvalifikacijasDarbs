@extends('layouts.app')
@section("content")
    <div>
    <form class="m-4" action="{{ route('products.search') }}" method="GET">
        <input class="mr-2" type="text" name="search" placeholder="Search by product title" value="{{ isset($search) ? $search : '' }}">
        <button class="text-white hover:text-hover active:text-active transition duration-300" type="submit">Search</button>
    </form>
        <div class="flex">
            <!-- Filters bar -->
            <div class="bg-primary-800 text-white mx-4 w-1/6 h-full">
                <form class="p-4" action="{{ route('browse') }}" method="GET">
                    @csrf

                    <!-- Categories filter -->
                    <div>
                        <h4>Categories</h4>
                        @foreach($Categories as $category)
                        <div>
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                {{ in_array($category->id, request()->input('categories', [])) ? 'checked' : '' }}>
                            <label>{{ $category->name }}</label>
                        </div>
                        @endforeach
                    </div>

                    <!-- Free products filter -->
                    <div class="pt-4">
                        <input type="checkbox" name="free" value="1" {{ request()->filled('free') ? 'checked' : '' }}>
                        <label>Show Free Products</label>
                    </div>

                    <!-- Submit button -->
                    <div class="pt-4">
                        <button class="text-white hover:text-hover active:text-active transition duration-300"  type="submit">Apply Filters</button>
                    </div>
                </form>
            </div>
            <!-- Catalog -->
            <div class="flex flex-wrap">
                @foreach($products as $product)
                    <a href="{{ route('productPage', ['id' => $product->id ]) }}">
                        <div class=" bg-primary-900 border-2 border-primary-950 w-64 h-64 m-2 p-1">
                        @if ($product->thumbnailImages->isNotEmpty())
                            <img class="object-cover h-36 w-full" src="{{ asset('storage/' . $product->thumbnailImages->first()->img_url) }}"/>
                        @else
                            <img src="#"/>
                        @endif
                            <div class="mt-4 text-white flex flex-col h-[35%]">
                                <h2 class="grow">{{ $product->Title }}</h2>
                                @if ($product->Price == 0.00)
                                    <p class="mt-auto text-right">Free</p>
                                @else
                                    <p class="mt-auto text-right">{{ $product->Price }}</p>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="text-white flex justify-center">
            {{ $products->onEachSide(1)->links('vendor.pagination.default') }}
        </div>
    </div>
@endsection
