@extends('layouts.app')

@section('content')

 <div class="container">
        <div class="confirmation-content">
            <img src="{{ url('/images/ic_mail.png') }}" class="gambar-success mt-4" width="300" height="300"></img>
            <h3>Transaksi Berhasil</h3>
            <p class="mx-5 my-3 text-center">Kami telah kirimkan tagihan ke email kamu, silahkan selesaikan pembayaran
            </p>
            <a href="/" class="btn btn-backto-dasboard">Kembali ke dashboard</a>
        </div>
    </div>

@endSection

@push('addons-css')
<link rel="stylesheet" href="{{ url('/styles/sukses.css') }}">
@endpush