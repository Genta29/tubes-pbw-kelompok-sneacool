<!-- resources/views/products/edit.blade.php -->

@extends('layouts.admin')

@section('container')
<div class="bg" style="background-image: url({{ asset('img/bgRegist.png') }}); height: 100vh;">


    <div class="container mt-4">
        <h2>Edit Product</h2>
        <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $product->nama }}" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Price</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $product->harga }}" required>
            </div>

            <div class="mb-3">
                <label for="detail" class="form-label">Details</label>
                <textarea class="form-control" id="detail" name="detail" required>{{ $product->detail }}</textarea>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stok" name="stok" value="{{ $product->stok }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>
    </div>
@endsection
