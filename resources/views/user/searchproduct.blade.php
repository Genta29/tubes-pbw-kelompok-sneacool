<!-- resources/views/products/search.blade.php -->

@extends('layouts.main')

@section('container')
    <div class="container mt-4">
        <h2>Search Results</h2>

        @if ($products->isEmpty())
            <p>No products found for "{{ $query }}".</p>
        @else
            <div class="row row-cols-1 row-cols-md-5 g-4">
                @foreach ($products as $product)
                    <div class="col">
                        <a href="{{ route('product.show', $product->id) }}" class="card-link text-decoration-none">
                            <div class="card h-100">
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->nama }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->nama }}</h5>
                                    <p class="card-text">{{ $product->detail }}</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Rp {{ number_format($product->harga, 2, ',', '.') }}</small>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
