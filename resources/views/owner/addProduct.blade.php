@extends('layouts.admin')

@section('container')

<div class="d-flex justify-content-center align-items-center" style="background-image: url({{ asset('img/bgRegist.png') }}); height: 100vh;">
    <div class="form w-50">
        <form method="POST" action="{{ route('store-product') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Price</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>

            <div class="mb-3">
                <label for="detail" class="form-label">Details</label>
                <textarea class="form-control" id="detail" name="detail" required></textarea>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stok" name="stok" required>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Category</label>
                <select class="form-select" id="kategori" name="kategori" required>
                    <option value="Men">Men</option>
                    <option value="Women">Women</option>
                    <option value="Unisex">Unisex</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
        </form>
    </div>
</div>

@endsection
