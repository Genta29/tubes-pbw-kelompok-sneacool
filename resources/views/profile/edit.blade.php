<!-- resources/views/profile/edit.blade.php -->

@extends('layouts.main')

@section('container')
    <div class="bg">
        <div class="section" style="background-color: aliceblue; height: 100%">
            <div class="container mt-4">
                <h2>Edit Profile</h2>
                <form method="POST" action="{{ route('profile.update') }}" class="mt-4">
                    @csrf
                    @method('PUT')

                    <!-- Bagian Profil -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Username / Storename</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="nomor_hp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ auth()->user()->nomor_hp }}">
                    </div>

                    <!-- Bagian Ganti Password -->
                    <h2 class="mt-4">Change Password</h2>

                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" autocomplete="current-password">
                        @error('current_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="new-password">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
