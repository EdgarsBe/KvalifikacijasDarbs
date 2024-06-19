@extends('layouts.app')
@section('content')
<div id="Dashboard" class="h-full">
    <div class="mx-12 mt-4 h-[5%]">
        <div class="text-white  card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="h-[95%] m-8 mt-0 flex flex-row">
        <div class="flex flex-col mx-4 w-1/2">
            <form action="{{ route('ChangePFP') }}" method="post" enctype="multipart/form-data" class="flex items-center bg-primary-900 border 1 rounded border-primary-950 h-1/5 my-4">
                @csrf
                @method('put')
                <label class="bg-primary-200 m-6 h-24 w-24 cursor-pointer rounded-full border 3 border-primary-950 overflow-hidden object-contain"  id="fileUpload">
                    <img class="h-full object-cover hover:opacity-50 transition-opacity" src="{{ $users->getImgURL() }}">
                </label>
                <input type="file" id="fileInput" name="pfp" class="hidden" >
                <button class="text-white" >Save Profile Picture</button>
            </form>
            <div class="bg-primary-900 border 1 rounded border-primary-950 h-4/5 my-4">
                <div class="m-4">
                    <h2 class="text-white">Addresses</h2>
                </div>
            </div>
        </div>
        <div class="flex flex-col mx-4 w-1/2">
            <div class="bg-primary-900 border 1 rounded border-primary-950 h-1/2 my-4">
                <div class="m-4">
                    <h2 class="text-xl text-white">Personal Information</h2>
                    <form method="post" action="{{ route('ChangeName') }}" class="my-4 flex flex-col justify-center">
                        @csrf
                        <h3 class="text-white">Firstname</h3>
                        <input name="firstname" class="w-full p-2 my-2 outline-none border-primary-200 border-2 bg-primary-100" value="{{ $users->firstname }}" placeholder="FirstName" required>
                        <h3 class="text-white">Lastname</h3>
                        <input name="lastname" class="w-full p-2 my-2 outline-none border-primary-200 border-2 bg-primary-100" value="{{ $users->lastname }}" placeholder="LastName" required>
                        <h3 class="text-white">Username</h3>
                        <input name="name" class="w-full p-2 my-2 outline-none border-primary-200 border-2 bg-primary-100" value="{{ $users->name }}" placeholder="Username" required>
                        <button type="submit" class="text-white border-primary-950 transition duration-500 w-1/3 py-2 rounded-xl bg-primary-950 hover:bg-primary-900 hover:border-border-cyan border-2 active:bg-primary-950">Save Changes</button>
                    </form>
                </div>
            </div>
            <div class="bg-primary-900 border 1 rounded border-primary-950 h-1/2 my-4 text-white">
                <div class="m-2">
                    <div class="m-4 my-8">
                        <div class="m-4 flex gap-4"> 
                            <h3 class="my-2">Change Email</h3>
                            <button class="transition duration-500 text-white w-24 py-2 rounded-xl bg-primary-950 border-primary-950 hover:bg-primary-800 hover:border-border-cyan border-2 active:bg-primary-950">Change</button>
                        </div>
                        <div class="m-4 flex gap-4">
                            <h3 class="my-2">Change Password</h3>
                            <button id="UpdateBtn" class="transition duration-500 text-white w-24 py-2 rounded-xl bg-primary-950 border-primary-950 hover:bg-primary-800 hover:border-border-purple border-2 active:bg-primary-950">Change</button>
                        </div>
                        <div class="m-4 flex gap-4">
                            <h3 class="my-2">Delete Account</h3>
                            <button id="DeleteBtn" class="transition duration-500 text-white w-24 py-2 rounded-xl bg-primary-950 border-primary-950 hover:bg-primary-800 hover:border-border-cyan border-2 active:bg-primary-950">Delete</button>
                        </div>
                        @if(session('success'))
                            <p>{{ session('success') }}</p>
                        @endif
                        @if(session('fail'))
                            <p>{{ session('fail') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="EmailForm" class="hidden">

</form>
<div id="PasswordForm" class="h-full w-full justify-center items-center hidden">
    <form method="post" action="{{ route('UpdatePassword') }}" class="h-3/5 w-2/5 bg-primary-50 border 1 rounded border-primary-200 my-4">
        @csrf
        @method('PUT')
        <div class="flex flex-col justify-center items-center m-4">
            <p class="text-center">Fill out these inputs to change your password!</p>
            <div class="my-4">
                <h3>Old Password</h3>
                <input class="w-full p-2 my-2 outline-none border-primary-200 border-2 rounded-lg bg-primary-100" required name="oldPass">
                <h3>New Password</h3>
                <input class="w-full p-2 my-2 outline-none border-primary-200 border-2 rounded-lg bg-primary-100" required name="newPass">
                <h3>Repeat New Password</h3>
                <input class="w-full p-2 my-2 outline-none border-primary-200 border-2 rounded-lg bg-primary-100" required name="newPass_confirmation">
            </div>
            <div class="my-8 flex gap-8">
                <button class="transition duration-500 text-black w-24 py-2 rounded-xl bg-primary-300 hover:bg-primary-200 active:bg-primary-400" id="StopPass">Cancel</button>
                <button class="transition duration-500 text-black w-24 py-2 rounded-xl bg-primary-300 hover:bg-primary-200 active:bg-primary-400" type="submit">Change</button>
            </div>
        </div>
    </form>
</div>
<div id="DeleteForm" class="h-full w-full flex justify-center items-center hidden">
    <form method="post" action="{{ route('DeleteAccount') }}" class="h-1/5 w-1/5 bg-primary-50 border 1 rounded border-primary-200 my-4">
        @csrf
        @method('DELETE')
        <div class="flex flex-col justify-center items-center m-4">
            <p class="text-center">Are you sure you wish to delete your account?</p>
            <div class="my-8 flex gap-8">
                <button class="transition duration-500 text-black w-24 py-2 rounded-xl bg-primary-300 hover:bg-primary-200 active:bg-primary-400" id="StopDelete">Cancel</button>
                <button class="transition duration-500 bg-[#a80c0c] text-white w-24 py-2 rounded-xl hover:bg-[#cc0909] active:bg-[#8b1111]" type="submit">Delete</button>
            </div>
        </div>
    </form>
</div>
@endsection
