<!-- resources/views/customizations/index.blade.php -->

@extends('layouts.admin')

@section('container')
    <div class="bg">
        <div class="section" style="background-color: aliceblue; height: 100%">
            <div class="container mt-4">
                <h2>Customizations</h2>

                @if ($customizations->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                                <!-- Add more columns as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customizations as $customization)
                                <tr>
                                    <td>{{ $customization->id }}</td>
                                    <td>{{ $customization->description }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $customization->image) }}" alt="Customization Image" width="100">
                                    </td>
                                    <td>{{ $customization->status }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewImageModal{{ $customization->id }}">
                                            <i class="bi bi-eye"></i> View
                                        </button>
                                        <form action="{{ route('customization.approve', $customization->id) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('patch')
                                            <button type="submit" class="btn btn-success">Approve</button>
                                        </form>

                                        <form action="{{ route('customization.reject', $customization->id) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                        </form>
                                       
                                        

                                        <!-- View Image Modal -->
                                        <div class="modal fade" id="viewImageModal{{ $customization->id }}" tabindex="-1" aria-labelledby="viewImageModalLabel{{ $customization->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewImageModalLabel{{ $customization->id }}">View Customization Image</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('storage/' . $customization->image) }}" alt="Customization Image" class="img-fluid">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- Add more cells as needed -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No customizations found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
