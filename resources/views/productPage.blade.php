@extends('layouts.app')
@section("content")
<div class="flex justify-between p-8">
    <div class="text-white">
        <div class="relative overflow-hidden mb-4">
            <div class="flex">
                @foreach ($product->images as $image)
                    <div class="w-full flex-shrink-0">
                        <img src="{{ asset('storage/' . $image->img_url) }}" alt="{{ $product->Title }}" class="w-[42vw] h-[49vh] object-cover">
                    </div>
                @endforeach
            </div>
        </div>
        <h1>{{ $product->Title }}</h1>
        @if ($product->Price == 0.00)
            <h2>Free</h2>
        @else
            <h2>{{ $product->Price }}</h2>
        @endif
        <div class="mt-4">
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button class="text-white hover:text-purple transition-colors duration-300" type="submit">Add to Cart</button>
            </form>
        </div>
        <p class="mt-8">{{ $product->Summary }}</p>
    </div>
    
    <div class="text-white">
        <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
        <p class="mt-2">Total Comments: {{ $comments->count() }}</p>
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div class="bg-green-200 p-4 rounded-lg">
                <h2 class="text-lg font-bold">Overall Rating</h2>
                <p>{{ $sentimentMajority }}</p>
            </div>
        </div>

        <hr class="my-4">
    </div>
</div>
<div>
<div class="text-white p-8">
    <h2 class="text-xl font-bold">Comments</h2>
        <form action="{{ route('products.comments.store', ['productId' => $product->id]) }}" method="POST" class="mt-4">
            @csrf
            <div class="flex">
                <input type="hidden" name="productId" value="{{ $product->id }}">
                <div class="flex flex-col w-4/12 mb-4 mr-4">
                    <label for="comment" class="text-sm font-semibold mb-1">Comment</label>
                    <textarea name="comment" id="comment" rows="3" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-blue-500"></textarea>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="text-sm font-semibold mb-1">Sentiment</label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="sentiment" value="positive" class="mr-1">
                        <span class="text-sm">Positive</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="sentiment" value="negative" class="mr-1">
                        <span class="text-sm">Negative</span>
                    </label>
                </div>
            </div>
            <button type="submit" class="text-white hover:text-purple transition-colors duration-300">Add Comment</button>
        </form>

        <div class="mt-4">
            @foreach ($comments as $comment)
            <div class="flex items-center border-2 m-1 border-primary-900">
                <label class="bg-primary-200 m-6 h-12 w-12 cursor-pointer rounded-full border 3 border-primary-950 overflow-hidden object-contain"  id="fileUpload">
                    <img src="{{ $comment->user->getImgURL() }}" class="h-full object-cover hover:opacity-50 transition-opacity">
                </label>
                <div class="bg-gray-100 rounded-md p-3 mt-2">
                    <p>{{ $comment->user->name }}</p>
                    <p class="text-sm">{{ $comment->comment }}</p>
                    <small class="block mt-1 text-xs text-gray-500">Sentiment: {{ ucfirst($comment->sentiment) }}</small>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
