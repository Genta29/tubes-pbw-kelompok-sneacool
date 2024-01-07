<!-- resources/views/transactions/index.blade.php -->

@extends('layouts.main')

@section('container')
<div class="bg">
    <div class="section" style="background-color: aliceblue;">
        <div class="container mt-4">
            <h2 class="mb-4">My Transactions</h2>

            @if ($transactions->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Bukti tf</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->customization->user->name }} </td>


                            <td>
                                <img src="{{ asset('storage/' . $transaction->proof_of_payment) }}"
                                    alt="Customization Image" width="100">
                            </td>
                            <td>{{ $transaction->customization->status }} </td>
                            <td>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#viewImageModal{{ $transaction->id }}">
                                    <i class="bi bi-eye"></i> View
                                </button>

                                <form action="{{ route('transaction.approve', $transaction->customization->id) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('patch')
                                            <button type="submit" class="btn btn-success">Approve</button>
                                        </form>

                                        <form action="{{ route('customization.reject', $transaction->customization->id) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                        </form>
                            </td>

                            <!-- View Image Modal -->
                            <div class="modal fade" id="viewImageModal{{ $transaction->id }}" tabindex="-1"
                                aria-labelledby="viewImageModalLabel{{ $transaction->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewImageModalLabel{{ $transaction->id }}">View
                                                Customization Image</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('storage/' . $transaction->proof_of_payment) }}"
                                                alt="Customization Image" class="img-fluid">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
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
            </div>
            @else
            <p>No transactions found.</p>
            @endif
        </div>
    </div>
</div>
@endsection