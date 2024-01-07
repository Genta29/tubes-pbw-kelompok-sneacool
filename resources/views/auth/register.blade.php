@extends('layouts.main')

@section('container')
        <div class="bg d-flex justify-content-center align-items-center" style="background-image: url({{ asset('img/bgRegist.png') }});">
            <div class="form w-25 mt-5 mb-5">
                <div class="mb-3 fw-bold" style="font-weight: bold; font-size: 1.2em;">
                    Register
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                
                    <div class="mb-3">
                        <label for="name" class="form-label">Username / Storename</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="user">User</option>
                            <option value="brand_owner">Brand Owner</option>
                        </select>
                    </div>
                
                    <div class="mb-3">
                        <label for="nomor_hp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp">
                    </div>
                
                    <div class="p-3">
                    <div class="mb-3">
                        <div class="text">Already have an account? <a href="{{ route('login') }}" class="text-decoration-none">Login</a></div>
                    </div>

                    </div>

                    <div class="mb-3">
                    <button type="submit" class="btn bg-dark text-light w-100">Create an account</button>
                    </div>
                </form>
                </div>
        </div>
@endsection