@include('admin.AdminPage')
<div>

    <div class="px-20 py-10 rounded-2xl border-[#6C7A89] border-2 bg-[#354649]">
        <form class="flex flex-col items-center" method="POST" action="{{ route('ProductAdd.store') }}">
            @csrf
            <div class="w-full h-1/2 my-5">
                <input class="pl-[1vw] pr-[2.5vw] outline-none border-2 rounded-full w-full h-12 bg-white" type="text" name="Title" placeholder="Title">
            </div>
            <div class="w-full h-1/2 my-5">
                <textarea class="pl-[1vw] pr-[2.5vw] outline-none border-2 w-full h-12 bg-white" name="Summary" placeholder="Description"></textarea>
            </div>
            <div class="w-full h-1/2 my-5">
                <input class="pl-[1vw] pr-[2.5vw] outline-none border-2 rounded-full w-full h-12 bg-white" type="number" placeholder="Price" name="Price" min="0" step="0.01">
            </div>
            <div class="w-full h-1/2 my-5">
                <input class="pl-[1vw] pr-[2.5vw] outline-none border-2 rounded-full w-full h-12 bg-white" type="date" name="ReleaseDate" placeholder="ReleaseDate">
            </div>
            <div class="w-full h-1/2 my-5">
                <input class="pl-[1vw] pr-[2.5vw] outline-none border-2 rounded-full w-full h-12 bg-white" type="text" name="Developer" placeholder="Developer">
            </div>
            <div class="w-full h-1/2 my-5">
                <input class="pl-[1vw] pr-[2.5vw] outline-none border-2 rounded-full w-full h-12 bg-white" type="text" name="Publisher" placeholder="Publisher">
            </div>
            <button class="text-[#E0E7E9] " type="submit">Submit</button>
        </form>
    </div>
</div>