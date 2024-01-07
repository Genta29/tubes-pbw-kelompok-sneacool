<!-- resources/views/brand_owners/show.blade.php -->

@extends('layouts.main')

@section('container')
    <div class="bg-light">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-4">
                    <!-- Brand Owner Profile -->
                    <div class="card shadow-lg">
                        <div class="card-body text-center">
                            <h2 class="card-title">{{ $brandOwner->name }}</h2>
                            <p class="card-text">Contact the seller:</p>
                            <a href="https://wa.me/{{ $brandOwner->nomor_hp }}" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-lg">
                                <i class="bi bi-whatsapp"></i> Hubungi Penjual
                            </a>
                            <!-- Display other brand owner information here -->
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <!-- List of Products -->
                    <h3 class="mb-4">Products by {{ $brandOwner->name }}</h3>

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @forelse ($brandOwner->products as $product)
                        <div class="col mb-4">
                            <div class="card h-100 shadow">
                                <a href="{{ route('product.show', $product->id) }}" class="text-decoration-none" style="color: inherit;">
                                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->nama }}">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark">{{ $product->nama }}</h5>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <small class="text-muted">Rp {{ number_format($product->harga, 2, ',', '.') }}</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @empty
                            <div class="col">
                                <p class="text-muted">No products found for {{ $brandOwner->name }}.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection