<!-- resources/views/product/index.blade.php -->

@extends('layouts.main')

@section('container')
    <!-- Content -->
    <div class="bg">
     

        <div id="section1" class="section">
            <img src="{{ asset('img/sec1.png') }}" alt="">
        </div>
        
        <div id="section2" class="section d-flex justify-content-center align-items-center" style="background-image: url('img/section2.png'); background-size: cover; background-position: center; height: 140vh;">
             <img src="{{ asset('img/gede.png') }}" alt="" style="width: 80%;" data-aos="fade-up" data-aos-duration="2500">
        </div>



        <div id="section3" class="section">
            <img src="{{ asset('img/sec3.png') }}" alt="">
        </div>


        <div id="section4" class="section mb-4 mt-4" style="background-image: url({{ asset('img/bgRegist.png') }});">
        <div class="row row-cols-1 row-cols-md-5 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <a href="{{ route('product.show', $product->id) }}" class="card-link text-decoration-none">
                        <div class="card h-100">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->nama }}">
                            <div class="card-body">
                                <h5 class="card-title text-dark">{{ $product->nama }}</h5>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Rp {{ number_format($product->harga, 2, ',', '.') }}</small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        </div>

        <div id="section5" class="section">
        <img src="{{ asset('img/sec4.png') }}" alt="">
        </div>

        

        
    </div>
@endsection
