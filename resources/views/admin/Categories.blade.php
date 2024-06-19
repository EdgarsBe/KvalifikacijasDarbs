@include('admin.AdminPage')
<div class="w-5/6 flex justify-center items-center">
        <form id="table" action="{{ route('admin.Categories') }}" class="w-2/6 flex flex-col justify-center text-center" method="post">
            <h1 class="text-xl mb-8 text-white">Categories</h1>
            @csrf
            @method('DELETE')

            @if (isset($categories))
            <table class="text-white table-auto">
                <thead class="border-b-2 border-primary-50">
                    <tr>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left hidden delCheck">Box</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">No.</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">Category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr class="cursor-pointer row-popup" data-id="{{ $category->id }}" data-name="{{ $category->name }}">
                        <td class="hidden delCheck">
                            <input type="checkbox" name="row=ids[]" value="{{ $category->id }}">
                        </td>
                        <td class="p-4 text-left">{{ $category->id }}</td>
                        <td class="p-4 text-left">{{ $category->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
            @else
            <h2>No Categories in Database</h2>
            @endif
            <div>
                <span id="ProductSel">
                    <button id="ShowPop" class="transition duration-500 bg-primary-500 text-white px-10 mt-20 mr-10 py-2 rounded-xl hover:bg-primary-600 active:bg-primary-700">Add Category</button>
                    <button id="SelectDelete" class="transition duration-500 bg-[#a80c0c] text-white px-10 mt-20 ml-10 py-2 rounded-xl hover:bg-[#cc0909] active:bg-[#8b1111]">Delete Categories</button>
                </span>
                <span id="ProductDel" class="hidden">
                    <button id="Delete" type="submit" class="transition duration-500 bg-[#a80c0c] text-white px-10 mt-20 mr-10 py-2 rounded-xl hover:bg-[#cc0909] active:bg-[#8b1111]">Delete</button>
                    <button id="CancelSelect" type="button" class="transition duration-500 bg-primary-500 text-white px-10 mt-20 ml-10 py-2 rounded-xl hover:bg-primary-600 active:bg-primary-700">Cancel</button>
                </span>
                @if(session('success'))
                    <p>{{ session('success') }}</p>
                @endif
                @if(session('fail'))
                    <p>{{ session('fail') }}</p>
                @endif
            </div>
        </form>


    <div method="POST" action="{{ route('update.Categories') }}" class="w-1/2 h-2/5 bg-primary-800 border-[0.2vw] border-primary-900 rounded-2xl hidden" id="PopupContainer">
        <div class="m-4">
            <span class=" cursor-pointer text-2xl transition duration-500 bg-[#a80c0c] text-white rounded-md hover:bg-[#cc0909] active:bg-[#8b1111] p-2 py-[1px] border-2 border-slate-500 close">&times;</span>
            <div class="mt-8 flex flex-row justify-center">
                <div class="flex flex-col text-white gap-2">
                    <p>ID:</p>
                    <p>Category:</p>
                </div>    
                <form method="POST" action="{{ route('update.Categories') }}" class="flex flex-col items-center text-black gap-2">
                    @csrf
                    @method('PUT')
                    <input id="id" name="id" value="" hidden>
                    <p class="text-white" id="showID"></p>
                    <input class="ml-4" id="name" type="text" name="name" placeholder="Category" value='' >
                    <button type="submit" class="text-white hover:text-hover transition-colors">Edit</button>
                </form>
            </div>
        </div>
</div>

    <div id="PopForm" class="h-2/3 px-20 py-10 rounded-2xl border-primary-900 border-2 bg-primary-800 hidden">
        <form class="flex flex-col items-center" method="POST" action="{{ route('Category.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex">
                <div class="w-full h-1/2 my-5">
                    <input class="pl-[1vw] pr-[2.5vw] outline-none border-2 rounded-lg w-full h-12 bg-white" type="text" name="name" placeholder="Category">
                </div>
            </div>
            <button class="text-[#E0E7E9] " type="submit">Submit</button>
        </form>
    </div>
</div>
