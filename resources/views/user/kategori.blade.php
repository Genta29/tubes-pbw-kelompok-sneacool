@extends('layouts.main')

@section('container')
<div class="bg">


    <div id="section1" class="section mb-3">
        <img src="{{ asset('img/kategori.png') }}" alt="">
    </div>


    <div id="section2" class="section mb-3">
        <div class="mx-3 justify-content-end">
            <!-- <h2>Hasil Kategori {{ ucfirst($kategori) }}</h2> -->

            <!-- Tombol Filter Icon -->
            <button id="filterToggle" class="btn btn-secondary mb-3">
                <i class="bi bi-filter"></i> Filter
            </button>

            <!-- Form Filter (Disejukkan agar dihide terlebih dahulu) -->
            <form id="filterForm" action="{{ route('kategori.filter', $kategori) }}" method="GET" class="mb-4"
                style="display: none;">
                <!-- Tambahkan elemen formulir filter di sini -->
                <div class="row">
                    <div class="col-md-4">
                        <label for="nama" class="form-label">Nama Product</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ request('nama') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="harga_min" class="form-label">Harga Min</label>
                        <input type="number" class="form-control" id="harga_min" name="harga_min"
                            value="{{ request('harga_min') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="harga_max" class="form-label">Harga Max</label>
                        <input type="number" class="form-control" id="harga_max" name="harga_max"
                            value="{{ request('harga_max') }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Filter</button>
                <a href="{{ route('kategori', $kategori) }}" class="btn btn-secondary mt-2">Reset Filter</a>
            </form>

            <!-- <div class="row row-cols-1 row-cols-md-5 g-4">
                @forelse ($products as $product)
                <div class="col">
                    <div class="card h-100">
                        <a href="{{ route('product.show', $product->id) }}">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                                alt="{{ $product->nama }}" style="max-width: 100%; height: auto;">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nama }}</h5>
                        </div>
                        <div class="card-footer">Rp {{ number_format($product->harga, 2, ',', '.') }}
                        </div>
                    </div>
                </div>
                @empty
                <p>No products found.</p>
                @endforelse
            </div> -->

            <div class="card-carousel">
      <div class="card-wrapper">
        @forelse ($products as $product)
          <div class="card" style=" margin: 0 10px;
    width: 300px;
    transition: transform 0.5s ease-in-out;">
            <a href="{{ route('product.show', $product->id) }}">
              <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->nama }}" style="max-width: 100%; height: auto;">
            </a>
            <div class="card-body">
              <h5 class="card-title">{{ $product->nama }}</h5>
            </div>
            <div class="card-footer">Rp {{ number_format($product->harga, 2, ',', '.') }}</div>
          </div>
        @empty
          <p>No products found.</p>
        @endforelse
      </div>
    </div>
        </div>
    </div>
</div>

<!-- <div id="section3" class="section mb-3">
            <img src="{{ asset('img/kategori1.png') }}" alt="">
        </div> -->

<div id="section3" class="section d-flex justify-content-start align-items-center text-light mb-4"
    style="background-image: url('{{ asset('img/kategori1.png') }}'); background-size: cover; height: 130vh;">
    <div class="mx-5">
        <div class="fs-1 fw-bold" data-aos="fade-right" data-aos-duration="1500">
            "Look Stylish, Step <br>
            Confidently – Just With Our <br>
            Sneakers!"
        </div>
    </div>
</div>

<div id="section4" class="section mb-4 mt-4" style="background-image: url('{{ asset('img/bgRegist.png') }}');">

    <img src="{{ asset('img/sec4.png') }}" alt="">
</div>

<div id="section5" class="section">
    <div class="row row-cols-1 row-cols-md-5 g-4">
        @forelse ($products as $product)
        <div class="col">
            <div class="card h-100">
                <a href="{{ route('product.show', $product->id) }}">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->nama }}"
                        style="max-width: 100%; height: auto;">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->nama }}</h5>
                </div>
                <div class="card-footer">Rp {{ number_format($product->harga, 2, ',', '.') }}
                </div>
            </div>
        </div>
        @empty
        <p>No products found.</p>
        @endforelse
    </div>
</div>

<div id="section5" class="section mt-4" style="background-image: url('{{ asset('img/bgRegist.png') }}');">

    <img src="{{ asset('img/sec4.png') }}" alt="">
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Toggle form filter ketika tombol ikon filter diklik
        $("#filterToggle").click(function () {
            $("#filterForm").slideToggle();
        });
    });
</script>
@endsection