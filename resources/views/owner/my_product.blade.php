@extends('layouts.admin')

@section('container')
    <div class="bg">
        <div class="container mt-4">
            <h2 class="mb-4">My Products</h2>

            <div class="add mb-4">
    <a href="{{ route('add-product') }}" class="btn btn-info btn-sm">
        <i class="bi bi-bag-plus-fill"></i> Tambah Produk
    </a>     
</div>


            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($userProducts as $product)
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->nama }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->nama }}</h5>
                                <p class="card-text">{{ $product->detail }}</p>
                                <p class="card-text"><strong>Rp {{ number_format($product->harga, 2, ',', '.') }}</strong></p>
                            </div>
                            <div class="card-footer">
                                <div class="btn-group gap-2" role="group" aria-label="Product Actions">
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection