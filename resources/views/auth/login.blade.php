@extends('layouts.app')

@section('content')
<div>
    <div>
        <div class="pt-40">
            <div class="flex justify-center items-center">

                <div class="md:w-[600px] w-[300px] px-8 py-10 rounded-3xl border-primary-700 border-2 bg-primary-900">
                    <div class="text-white text-center text-4xl">{{ __('Login') }}</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                        <div class="w-full h-1/2 my-5">
                        <label class="text-white" for="email">{{ __('Email Address') }}</label>
                            <div class="relative">
                                <input id="email" type="email" class="pl-[1vw] pr-[2.5vw] outline-none focus:border-primary-200 border-primary-700 border-2 w-full h-12 bg-white form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <i class='top-[0.65rem] right-3 absolute text-[1.7rem] bx bxs-user'></i>
                            </div>
                        </div>

                        <div class="w-full h-1/2 my-5">
                        <label for="password" class="text-white">{{ __('Password') }}</label>
                            <div class="relative">
                                <input id="password" type="password" class="pl-[1vw] pr-[2.5vw] outline-none focus:border-primary-200 border-primary-700 border-2 w-full h-12 bg-white form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <i class='top-[0.65rem] right-3 absolute text-[1.7rem] bx bxs-lock-alt' ></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <div>
                                <div class="flex-col flex md:flex-row justify-between gap-4">
                                    <div>
                                        <input class="form-check-input " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label  class="text-white form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div>
                            <div>
                                <button type="submit" class="text-white mt-[2vh] border-primary-700 border-2 transition duration-500 px-5 py-2 rounded-xl bg-primary-950 hover:bg-primary-800 hover:border-border-purple active:bg-primary-950 w-full btn btn-primary">
                                    {{ __('Login') }}
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
