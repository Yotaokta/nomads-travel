@extends('layouts.admin.admin')

@section('content-admin')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rubah Data Travel</h1>
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
                <form class="d-flex flex-column" action="{{ route('transaction.update', $transaction->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="transactionstatus" class="form-label">Status Transaksi</label>
                    </div>
                    <select name="transactional_status" id="transaksi_status">
                        <option value="IN_CART" @if ($transaction->transactional_status == "IN_CART")
                            @selected(true) @endif>Dalam Keranjang</option>
                        <option value="PENDING" @if ($transaction->transactional_status == "PENDING")
                            @selected(true) @endif>Pending</option>
                        <option value="SUCCESS" @if ($transaction->transactional_status == "SUCCESS")
                            @selected(true) @endif>Sukses</option>
                        <option value="CANCEL" @if ($transaction->transactional_status == "CANCEL")
                            @selected(true) @endif>Batal</option>
                        <option value="FAILED" @if ($transaction->transactional_status == "FAILED")
                            @selected(true) @endif>Gagal</option>
                    </select>

                    <button type="submit" class="btn btn-primary d-block p-3">Kirim</button>

                </form>
        </div>
    </div>

</div>

@endSection