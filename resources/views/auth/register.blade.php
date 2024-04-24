@extends('layouts.app')

@section('content')
<div>
    <div>
        <div class="pt-20">
            <div class="flex justify-center items-center">

                <div class="md:w-[600px] w-[300px] px-8 py-10 rounded-3xl border-primary-300 border-2 bg-primary-400">
                    <div class="text-white text-center text-4xl">{{ __('Register') }}</div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="w-full h-1/2 my-5">
                            <label for="firstname" class="text-white col-md-4 col-form-label text-md-end">{{ __('Firstname') }}</label>

                            <div class="relative">
                                <input id="firstname" type="text" class="pl-[1vw] pr-[2.5vw] outline-none border-primary-300 border-2 rounded-full w-full h-12 bg-white form-control @error('name') is-invalid @enderror" name="firstname" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <i class='top-[0.65rem] right-3 absolute text-[1.7rem] bx bxs-user'></i>
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full h-1/2 my-5">
                            <label for="lastname" class="text-white col-md-4 col-form-label text-md-end">{{ __('Lastname') }}</label>

                            <div class="relative">
                                <input id="lastname" type="text" class="pl-[1vw] pr-[2.5vw] outline-none border-primary-300 border-2 rounded-full w-full h-12 bg-white form-control @error('name') is-invalid @enderror" name="lastname" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <i class='top-[0.65rem] right-3 absolute text-[1.7rem] bx bxs-user'></i>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full h-1/2 my-5">
                            <label for="name" class="text-white col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="relative">
                                <input id="name" type="text" class="pl-[1vw] pr-[2.5vw] outline-none border-primary-300 border-2 rounded-full w-full h-12 bg-white form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <i class='top-[0.65rem] right-3 absolute text-[1.7rem] bx bxs-user'></i>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full h-1/2 my-5">
                            <label for="email" class="text-white col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="relative">
                                <input id="email" type="email" class="pl-[1vw] pr-[2.5vw] outline-none border-primary-300 border-2 rounded-full w-full h-12 bg-white form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <i class='top-[0.65rem] right-3 absolute text-[1.7rem] bx bxs-envelope'></i>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full h-1/2 my-5">
                            <label for="password" class="text-white col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="relative">
                                <input id="password" type="password" class="pl-[1vw] pr-[2.5vw] outline-none border-primary-300 border-2 rounded-full w-full h-12 bg-white form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <i class='top-[0.65rem] right-3 absolute text-[1.7rem] bx bxs-lock-alt' ></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full h-1/2 my-5">
                            <label for="password-confirm" class="text-white col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="relative">
                                <input id="password-confirm" type="password" class="pl-[1vw] pr-[2.5vw] outline-none border-primary-300 border-2 rounded-full w-full h-12 bg-white form-control" name="password_confirmation" required autocomplete="new-password">
                                <i class='top-[0.65rem] right-3 absolute text-[1.7rem] bx bxs-lock-alt' ></i>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="mt-[2vh] transition duration-500 text-white px-5 py-2 rounded-xl bg-primary-500 hover:bg-primary-600 active:bg-primary-700 w-full btn btn-primary">
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
