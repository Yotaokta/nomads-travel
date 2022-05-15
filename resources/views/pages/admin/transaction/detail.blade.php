@extends('layouts.admin.admin')

@section('content-admin')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi {{ $transaction->user->name }}</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
               <table class="table table-hover">
                   <tbody>
                    <tr>
                        <th>No</th>
                        <td>{{ $transaction->id }}</tr>
                    </tr>
                    <tr>
                        <th>Paket Travel</th>
                        <td>{{ $transaction->travel_package->title}}</tr>
                    </tr>
                    <tr>
                        <th>Nama Pengguna</th>
                        <td>{{ $transaction->user->name}}</tr>
                    </tr>
                    <tr>
                        <th>Tambahan Visa</th>
                        <td>{{ $transaction->additional_visa}}</tr>
                    </tr>
                    <tr>
                        <th>Total Transaksi</th>
                        <td>{{ $transaction->transaction_total}}</tr>
                    </tr>
                    <tr>
                        <th>Transaksi Status</th>
                        <td>{{ $transaction->transaction_status}}</tr>
                    </tr>
                    <tr>
                        <th>Memberi</th>
                        <td>
                               <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kebangsaan</th>
                                        <th>Visa</th>
                                        <th>DEO Passport</th>
                                    </tr>
                                        @foreach ($transaction->transaction_detail as $detail)
                                            <tr>{{ $detail->id }}</tr>
                                            <tr>{{ $detail->username }}</tr>
                                            <tr>{{ $detail->nationality }}</tr>
                                            <tr>{{ $detail->is_visa ? '30 Days' : 'N/A' }}</tr>
                                            <tr>{{ $detail->deo_passport }}</tr>
                                        @endforeach
                                </table>
                        </tr> 
                    </tr>
                   </tbody>
               </table>
        </div>
    </div>

</div>

@endSection