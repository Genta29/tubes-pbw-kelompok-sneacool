<!-- resources/views/product/index.blade.php -->

@extends('layouts.main')

@section('container')
    <!-- Content -->
    <div class="bg" style="background-image: url({{ asset('img/bguserw.png') }});">
        <div class="isi d-flex gap-5">
            <div class="kiri">
                <img src="{{ asset('img/imgorg.png') }}" alt="">

            </div>
            <div class="kanan mt-5">
                <img src="img/maskot.png" alt="">
                <div class="text mb-4">Welcome {{ Auth::user()->name }}</div>
                <div class="text mb-4">
                    Here you can keep track of your recent activity,<br>
                    request return/exchange authorizations for<br>
                    orders you have received, and view and edit <br>
                    your account information or list of favorite items
                </div>
                <div class="text mb-4">
                    We hope you enjoy your shopping experience <br>
                    at <span class="fw-bold">SneaCool</span> and can find what you are looking <br>
                    for.
                </div>
                <div class="myproduct">
                    <a href="{{ route('dashboard') }}">
                        <button class="btn btn-dark text-dark" type="button" style="background: none; border-radius: 10px;">
                            Get Started
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
