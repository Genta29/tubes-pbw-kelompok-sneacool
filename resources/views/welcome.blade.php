@extends('layouts.main')

@section('container')

<!-- Add this section to display success message -->
@if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

    <!-- Content -->
    <div class="bg">
        <div id="section1" class="section" style="background-image: url('img/section1.png'); height:100%">
            <div class="img p-5 mx-5">
                <img src="img/img1.png" alt="" width="600" height="200">
            </div>
        </div>
        <div id="section2" class="section" style="background-image: url('img/section2.png');">
            <div class="img p-5 mx-5">
                <img src="img/imgsec2.png" alt="">
            </div>
        </div>
        <div id="section3" class="section mt-4" style="background-color:aliceblue height:100%">
            <div class="row row-cols-1 row-cols-md-5 g-4">
                <div class="col">
                  <div class="card h-100">
                    <img src="img/sepatu1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Nike Air Force 107 </h5>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Rp 1,000,000,00</small>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100">
                    <img src="img/sepatu1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Nike Air Force 107 </h5>
                    
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Rp 1,000,000,00</small>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100">
                    <img src="img/sepatu1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Nike Air Force 107 </h5>
                     
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Rp 1,000,000,00</small>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100">
                    <img src="img/sepatu1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Nike Air Force 107 </h5>
                     
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Rp 1,000,000,00</small>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100">
                    <img src="img/sepatu1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Nike Air Force 107 </h5>
                  
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Rp 1,000,000,00</small>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection



<!-- resources/views/product/index.blade.php -->
