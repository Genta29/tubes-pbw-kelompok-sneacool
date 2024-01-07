<!-- resources/views/customizations/payment.blade.php -->

@extends('layouts.main')

@section('container')
    <div class="bg">
        <div class="section" style="background-color: aliceblue; height: 100%">
            <div class="container mt-4">
                <h2>Pembayaran Kustomisasi</h2>

                <form method="POST" action="{{ route('direct.ConfirmPayment') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $product_id->id }}">

                    <div class="mb-3">
                                <label for="address" class="form-label">Alamat Pengiriman</label>
                                <textarea class="form-control" id="address" name="address" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="bank" class="form-label">Pilih Bank</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bank" value="bca" required>
                            <label class="form-check-label">BCA</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bank" value="bri" required>
                            <label class="form-check-label">BRI</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bank" value="mandiri" required>
                            <label class="form-check-label">Mandiri</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bank" value="bni" required>
                            <label class="form-check-label">BNI</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bank" value="ovo" required>
                            <label class="form-check-label">OVO</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bank" value="dana" required>
                            <label class="form-check-label">DANA</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="proof_of_payment" class="form-label">Bukti Transfer (Gambar)</label>
                        <input type="file" class="form-control" id="proof_of_payment" name="proof_of_payment" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
                </form>
            </div>
        </div>
    </div>
@endsection