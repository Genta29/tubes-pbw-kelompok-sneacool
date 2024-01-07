<!-- resources/views/product/index.blade.php -->

@extends('layouts.admin')

@section('container')
    <!-- Content -->
    <div class="bg" style="background-image: url({{ asset('img/bguserw.png') }});">
        <div class="isi d-flex gap-5">
            <div class="kiri">
                <img src="{{ asset('img/sneakeradm.png') }}" alt="">
            </div>
            <div class="kanan mt-5">
                <img src="img/maskot.png" alt="">
                <div class="text mb-4">Welcome {{ Auth::user()->name }}</div>
                <div class="text mb-4">
                    We are very happy and proud to welcome<br>
                    {{ Auth::user()->name }} as part of our community. By<br>
                    joining this extraordinary brand, we are sure<br>
                    that we will further complete the variety of <br>
                    shoes collections on our platform.
                </div>
                <div class="text mb-4">
                    Thank you for your trust in joining SneaCool.<br>
                    We hope to work together to achieve mutual<br> 
                    success. Enjoy exploring this new world in <br> 
                    SneaCool !
                </div>
                <div class="myproduct">
                    <a href="{{ route('my-products') }}">
                        <button class="btn btn-dark text-dark" type="button" style="background: none; border-radius: 10px;">
                            Get Started
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
