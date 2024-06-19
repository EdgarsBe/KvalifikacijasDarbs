@include('admin.AdminPage')
<div class="w-5/6 flex justify-center items-center">
        <form id="table" action="{{ route('/Admin/Products') }}" class="w-4/5 flex flex-col justify-center text-center" method="post">
            <h1 class="text-xl mb-8 text-white">Products</h1>
            @csrf
            @method('DELETE')

            @if (isset($products))
            <table class="text-white table-auto">
                <thead class="border-b-2 border-primary-50">
                    <tr>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left hidden delCheck">Box</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">No.</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">Title</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">Summary</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">Price</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">ReleaseDate</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">Developer</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">Publisher</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr class="cursor-pointer row-popup" data-id="{{ $product->id }}" data-title="{{ $product->Title }}"
                    data-summary="{{ $product->Summary }}" data-price="{{ $product->Price }}" data-releasedate="{{ $product->ReleaseDate }}" 
                    data-developer="{{ $product->Developer }}" data-publisher="{{ $product->Publisher }}">
                        <td class="hidden delCheck">
                            <input type="checkbox" name="row=ids[]" value="{{ $product->id }}">
                        </td>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->Title }}</td>
                        <td>{{ $product->Summary }}</td>
                        <td>{{ $product->Price }}</td>
                        <td>{{ $product->ReleaseDate }}</td>
                        <td>{{ $product->Developer }}</td>
                        <td>{{ $product->Publisher }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
            @else
            <h2>No Products in Database</h2>
            @endif
            <div>
                <span id="ProductSel">
                    <button id="ShowPop" class="transition duration-500 bg-primary-500 text-white px-10 mt-20 mr-10 py-2 rounded-xl hover:bg-primary-600 active:bg-primary-700">Add Product</button>
                    <button id="SelectDelete" class="transition duration-500 bg-[#a80c0c] text-white px-10 mt-20 ml-10 py-2 rounded-xl hover:bg-[#cc0909] active:bg-[#8b1111]">Delete Products</button>
                </span>
                <span id="ProductDel" class="hidden">
                    <button id="Delete" type="submit" class="transition duration-500 bg-[#a80c0c] text-white px-10 mt-20 mr-10 py-2 rounded-xl hover:bg-[#cc0909] active:bg-[#8b1111]">Delete</button>
                    <button id="CancelSelect" type="button" class="transition duration-500 bg-primary-500 text-white px-10 mt-20 ml-10 py-2 rounded-xl hover:bg-primary-600 active:bg-primary-700">Cancel</button>
                </span>
                @if(session('success'))
                    <p class="text-white p-4">{{ session('success') }}</p>
                @endif
                @if(session('fail'))
                    <p class="text-white p-4">{{ session('fail') }}</p>
                @endif
            </div>
        </form>


    <div method="POST" action="{{ route('ProductUpdate') }}" class="w-1/2 h-4/5 bg-primary-800 border-[0.2vw] border-primary-900 rounded-2xl hidden" id="PopupContainer">
        <div class="m-4">
            <span class=" cursor-pointer text-2xl transition duration-500 bg-[#a80c0c] text-white rounded-md hover:bg-[#cc0909] active:bg-[#8b1111] p-2 py-[1px] border-2 border-slate-500 close">&times;</span>
            <div class="mt-8 flex flex-row justify-center">
                <div class="flex flex-col text-white gap-2">
                    <p>ID:</p>
                    <p>Title:</p>
                    <p>Summary:</p>
                    <p>Price:</p>
                    <p>Release Date:</p>
                    <p>Developer:</p>
                    <p>Publisher:</p>
                </div>    
                <form method="POST" action="{{ route('ProductUpdate') }}" class="flex flex-col items-center text-black gap-2">
                    @csrf
                    @method('PUT')
                    <input id="id" name="id" value="" hidden>
                    <p class="text-white" id="showID"></p>
                    <input id="Title" type="text" name="Title" placeholder="Title" value='' >
                    <textarea id="Summary" name="Summary" class="resize-none focus:resize" placeholder="Summary" rows=1 ></textarea>
                    <input id="Price" name="Price" type="number" min="0" placeholder="Price" value=''>
                    <input id="ReleaseDate" name="ReleaseDate" type="date" placeholder="ReleaseDate" value='' >
                    <input id="Developer" name="Developer" type="text" placeholder="Developer" value='' >
                    <input id="Publisher" name="Publisher" type="text" placeholder="Publisher" value='' >
                    <h4>Categories</h4>
                    @foreach($categories as $category)
                    <div>
                        <input type="checkbox" class="category-checkbox" name="categories[]" value="{{ $category->id }}">
                        <label>{{ $category->name }}</label>
                    </div>
                    @endforeach
                    <button type="submit" class="text-white hover:text-hover transition-colors">Edit</button>
                </form>
            </div>
        </div>
</div>

    <div id="PopForm" class="h-2/3 px-20 py-10 rounded-2xl border-primary-900 border-2 bg-primary-800 hidden">
        <form class="flex flex-col items-center" method="POST" action="{{ route('ProductAdd.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex">
                <div class="w-full h-1/2 my-5">
                    <input class="pl-[1vw] pr-[2.5vw] outline-none border-2 rounded-lg w-full h-12 bg-white" type="text" name="Title" placeholder="Title">
                </div>
                <div class="w-full h-1/2 my-5">
                    <input class="pl-[1vw] pr-[2.5vw] outline-none border-2 rounded-lg w-full h-12 bg-white" type="number" placeholder="Price" name="Price" min="0" step="0.01">
                </div>
                <div class="w-full h-1/2 my-5">
                    <input class="pl-[1vw] pr-[2.5vw] outline-none border-2 rounded-lg w-full h-12 bg-white" type="date" name="ReleaseDate" placeholder="ReleaseDate">
                </div>
            </div>
            <div class="flex">
                <div class="w-full h-1/2 my-5">
                    <input class="pl-[1vw] pr-[2.5vw] outline-none border-2 rounded-lg w-full h-12 bg-white" type="text" name="Developer" placeholder="Developer">
                </div>
                <div class="w-full h-1/2 my-5">
                    <input class="pl-[1vw] pr-[2.5vw] outline-none border-2 rounded-lg w-full h-12 bg-white" type="text" name="Publisher" placeholder="Publisher">
                </div>
            </div>
            <div class="w-full h-1/2 my-5">
                <textarea class="pl-[1vw] pr-[2.5vw] outline-none border-2 w-full h-12 bg-white" name="Summary" placeholder="Description"></textarea>
            </div>
            <h4 class=" text-white">Categories</h4>
            <div class="flex">
                @foreach($categories as $category)
                <div class="p-4">
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                    <label class="text-white">{{ $category->name }}</label>
                </div>
            @endforeach
            </div>
            <div>
                <input type="file" name="img_url[]" multiple="multiple">
            </div>
            <button class="text-[#E0E7E9] " type="submit">Submit</button>
        </form>
    </div>
</div>
