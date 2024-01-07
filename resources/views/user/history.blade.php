<!-- resources/views/customizations/index.blade.php -->

@extends('layouts.main')

@section('container')
    <div class="bg">
        <div class="section" style="background-color: aliceblue;">
            <div class="container mt-4">
                <h2 class="mb-4">My Customizations</h2>

                @if ($customizations->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customizations as $customization)
                                    <tr>
                                        <td>
                                            @if ($customization->image)
                                                <img src="{{ asset('storage/' . $customization->image) }}" alt="Customization Image" width="50">
                                            @endif
                                        </td>
                                        <td>{{ $customization->description }}</td>
                                        <td>{{ $customization->status }}</td>
                                        <td>
                                            @if ($customization->status == 'Dalam peninjauan')
                                                <form action="{{ route('customization.reject', $customization->id) }}" method="post" style="display: inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                                </form>
                                            @elseif ($customization->status == 'approved')
                                                <a href="{{ route('customization.payment', $customization->id) }}" class="btn btn-success btn-sm">Payment</a>
                                                <form action="{{ route('customization.reject', $customization->id) }}" method="post" style="display: inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                                </form>

                                                <!-- Tambahkan tautan WhatsApp dengan nomor HP Brand Owner -->
                                                <a href="https://wa.me/{{ $customization->product->user->nomor_hp }}" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-sm">
                                                    <i class="bi bi-whatsapp"></i> Beli Sekarang
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>No customizations found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection