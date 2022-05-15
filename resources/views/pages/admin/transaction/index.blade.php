@extends('layouts.admin.admin')

@section('content-admin')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-reponsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Travel</th>
                                <th>User</th>
                                <th>Visa</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>{{ $transaction->travel_package->title }}</td>
                                <td>{{ $transaction->user->name }}</td>
                                <td>{{ $transaction->additional_visa }}</td>
                                <td>{{ $transaction->transaction_total }}</td>
                                <td>{{ $transaction->transaction_status }}</td>
                                <td>
                                    <a href="{{ route('transaction.show', $transaction->id) }}" class="btn btn-primary">
                                        Detail
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('transaction.edit', $transaction->id) }}" class="btn btn-warning">
                                        Edit
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('transaction.destroy', $transaction->id) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">
                                            Hapus
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                  <td colspan="7" class="text-center">
                                  Belum Ada Transaksi
                                </td>  
                                </tr>
                            @endforelse                        
                        </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endSection