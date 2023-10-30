@extends('layouts.app')

@section('content')
<div>
    <div>
        <div class="pt-40">
            <div class="flex justify-center items-center">

                <div class="w-1/4 px-8 py-10 rounded-3xl border-slate-200 border-2 bg-gray-300">
                    <div class="text-center text-4xl">{{ __('Register') }}</div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="w-full h-1/2 my-5">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="relative">
                                <input id="name" type="text" class="pl-[1vw] pr-[2.5vw] outline-none border-2 rounded-full w-full h-12 bg-transparent form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <i class='top-[0.65rem] right-3 absolute text-[1.7rem] bx bxs-user'></i>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full h-1/2 my-5">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="relative">
                                <input id="email" type="email" class="pl-[1vw] pr-[2.5vw] outline-none border-2 rounded-full w-full h-12 bg-transparent form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <i class='top-[0.65rem] right-3 absolute text-[1.7rem] bx bxs-envelope'></i>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full h-1/2 my-5">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="relative">
                                <input id="password" type="password" class="pl-[1vw] pr-[2.5vw] outline-none border-2 rounded-full w-full h-12 bg-transparent form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <i class='top-[0.65rem] right-3 absolute text-[1.7rem] bx bxs-lock-alt' ></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full h-1/2 my-5">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="relative">
                                <input id="password-confirm" type="password" class="pl-[1vw] pr-[2.5vw] outline-none border-2 rounded-full w-full h-12 bg-transparent form-control" name="password_confirmation" required autocomplete="new-password">
                                <i class='top-[0.65rem] right-3 absolute text-[1.7rem] bx bxs-lock-alt' ></i>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="mt-[2vh] transition duration-500 text-black px-5 py-2 rounded-xl hover:bg-[#ebe0e6] active:bg-white w-full btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
