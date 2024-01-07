<!-- resources/views/customization/create.blade.php -->

@extends('layouts.main')

@section('container')
    <div class="bg">
        <div class="section" style="background-color: aliceblue; height: 100%">
            <div class="container mt-4">
                <h2 class="mb-4">Kustomisasi Produk: {{ $product->nama }}</h2>

                <div class="row">
                    <div class="col-md-8">
                        <form method="POST" action="{{ route('customization.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi Customisasi</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Referensi Gambar</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Buat Kustomisasi</button>
                        </form>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-fluid" alt="{{ $product->nama }}">
                            <div class="card-body">
                                Product by  <a href="{{ route('brand-owner.show', $product->user->id) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-person"></i> {{ $product->user->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection