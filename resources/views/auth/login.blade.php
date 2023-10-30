@extends('layouts.app')

@section('content')
<div>
    <div>
        <div class="pt-40">
            <div class="flex justify-center items-center">

                <div class="w-1/4 px-8 py-10 rounded-3xl border-slate-200 border-2 bg-gray-300">
                    <div class="text-center text-4xl">{{ __('Login') }}</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                        <div class="w-full h-1/2 my-5">
                        <label for="email">{{ __('Email Address') }}</label>
                            <div class="relative">
                                <input id="email" type="email" class="pl-[1vw] pr-[2.5vw] outline-none border-2 rounded-full w-full h-12 bg-transparent form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <i class='top-[0.65rem] right-3 absolute text-[1.7rem] bx bxs-user'></i>
                            </div>
                        </div>

                        <div class="w-full h-1/2 my-5">
                        <label for="password" class="">{{ __('Password') }}</label>
                            <div class="relative">
                                <input id="password" type="password" class="pl-[1vw] pr-[2.5vw] outline-none border-2 rounded-full w-full h-12 bg-transparent form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
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
                                <div class="flex justify-between">
                                    <div>
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div>
                            <div>
                                <button type="submit" class="mt-[2vh] transition duration-500 text-black px-5 py-2 rounded-xl hover:bg-[#ebe0e6] active:bg-white w-full btn btn-primary">
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
