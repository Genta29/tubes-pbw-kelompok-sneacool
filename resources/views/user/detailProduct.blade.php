<!-- resources/views/products/show.blade.php -->

@extends('layouts.main')

@section('container')
    <div class="container mt-4 mb-4" style="background-image: url({{ asset('img/Background.png') }})">
        <div class="row">
            <!-- Bagian Kiri (Nama Produk dan Gambar) -->
            <div class="col-md-5">
                <div class="card shadow">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->nama }}">
                    <div class="card-body">
                    Product by  <a href="{{ route('brand-owner.show', $product->user->id) }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-person"></i> {{ $product->user->name }}
                        </a>

                    </div>
                </div>
            </div>

            <!-- Bagian Kanan (Detail Produk dan Harga) -->
            <div class="col-md-7">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title">{{ $product->nama }}</h4>
                        <h2 class="card-text">Rp {{ number_format($product->harga)}}</h2>
                    </div>
                </div>

                <div class="card mt-3 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Detail</h5>
                        <p class="card-text"> Kategori: {{ $product->kategori }} <br>
                            Deskripsi: {{ $product->detail }}
                        </p>
                    </div>
                </div>

                <!-- <div class="card mt-3 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Penjual</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="{{ route('brand-owner.show', $product->user->id) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-person"></i> {{ $product->user->name }}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="https://wa.me/{{ $product->user->nomor_hp }}" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-sm">
                                    <i class="bi bi-whatsapp"></i> Beli Sekarang
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> -->

                <div class="card mt-3 shadow">
                    <div class="card-body">
                        {{-- <h5 class="card-title">Kustomisasi</h5> --}}
                        <a href="https://wa.me/{{ $product->user->nomor_hp }}" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-sm">
                            <i class="bi bi-whatsapp"></i> Hubungi Penjual
                        </a>    
                        <a href="{{ route('customization.create', ['product_id' => $product->id]) }}" class="btn btn-info btn-sm">
                            <i class="bi bi-gear"></i> Kustomisasi Produk
                        </a>             
                        <a href="{{ route('direct.payment', ['product_id' => $product->id]) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-bag"></i> Beli Produk
                        </a>             
                </div>
            </div>
        </div>
    </div>

    <div id="section2" class="section mb-4 mt-4" style="background-image: url('{{ asset('img/bgRegist.png') }}');">

    <img src="{{ asset('img/detail1.png') }}" alt="">
</div>
@endsection