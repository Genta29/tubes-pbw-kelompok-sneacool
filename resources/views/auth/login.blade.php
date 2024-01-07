@extends('layouts.main')

@section('container')
        <div class="bg d-flex justify-content-center align-items-center" style="background-image: url({{ asset('img/bgRegist.png') }}); height:100vh">
            <div class="form w-25 mt-5 mb-5">
                <div class="mb-3 fw-bold" style="font-weight: bold; font-size: 1.2em;">
                    Login
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
        
                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" class="form-control form-control-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
        
                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" class="form-control form-control-sm" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
        
                    <!-- Remember Me -->
                    <div class="mb-3 form-check">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                    </div>
        
                    <div class="d-flex justify-content-between mt-5">
                    <div class="mb-3">
                        <a href="{{ route('register') }}" class="text-underline text-dark">Create an account</a>
                    </div>

                    <div class="mb-3">
                    <button type="submit" class="btn bg-dark text-light" style="width: 190px">Login</button>
                    </div>
                    </div>
                </form>
                </div>
        </div>
@endsection