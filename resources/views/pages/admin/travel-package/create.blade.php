@extends('layouts.admin.admin')

@section('content-admin')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Paket Travel</h1>
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
                <form class="d-flex flex-column" action="{{ route('travel-package.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                    <label for="title" class="form-label">Nama Paket Travel</label>
                    <input type="text" name="title" class="form-control" maxlength="30" value="{{ old('title') }}" id="title" placeholder="ex: Travel to Ubud" autofocus>
                    </div>

                    <div class="mb-3">
                    <label for="location" class="form-label">Lokasi Travel</label>
                    <input type="text" name="location" maxlenght="30" value="{{ old('location') }}" id="location" class="form-control" placeholder="ex: Lembang, Bandung">
                    </div>

                    <div class="mb-3">
                    <label for="about" class="form-label">Deskripsi Travel</label>
                    <textarea name="about" cols="20" rows="10" value="{{ old('about') }}" id="about" class="form-control" placeholder="ex: Lembang merupakan tempat yang ...."></textarea>
                    </div>

                    <div class="mb-3">
                    <label for="featured_event" class="form-label">Fasilitas Travel</label>
                    <input type="text" maxlength="20" class="form-control" name="featured_event" value="{{ old('featured_event') }}" id="featured_event" placeholder="ex: Kolam Renang">
                    </div>

                    <div class="mb-3">
                    <label for="language" class="form-label">Bahasa Lokal</label>
                   <select class="form-control" name="language" id="language">
                        <option value="Indonesia" selected>Indonesia</option>
                        <option value="Inggris">Inggris</option>
                    </select>
                    </div>

                    <div class="mb-3">
                    <label for="food" class="form-label">Makanan Lokal</label>
                   <select class="form-control" name="food" id="food">
                        <option value="Local Food" selected>Masakan Lokal</option>
                        <option value="Oriental Food">Masakan Oriental</option>
                        <option value="Europa Food">Masakan Eropa</option>
                    </select>
                    </div>

                    <div class="mb-3">
                    <label for="departure_date" class="form-label">Tanggal Keberangkatan</label>
                   <input type="date" class="form-control" name="departure_date" id="departure_date" value="{{ old('departure_date') }}">
                    </div>

                    <div class="mb-3">
                    <label for="duration" class="form-label">Durasi Travel</label>
                    <input class="form-control" type="text" name="duration" id="duration" value="{{ old('duration') }}" maxlength="10" placeholder="ex: 2D 1N">
                    </div>

                    <div class="mb-3">
                    <label for="type" class="form-label">Travel Tipe</label>
                    <select class="form-control" name="type" id="type">
                        <option value="Open Trip" selected>Open Trip</option>
                        <option value="Private Trip">Private Trip</option>
                    </select>
                    </div>

                    <div class="mb-3">
                    <label for="price" class="form-label">Harga Paket (Rupiah)</label>
                    <input class="form-control" type="number" name="price" id="price" value="{{ old('price') }}" min="200000" step="50000">
                    </div>

                    <button type="submit" class="btn btn-primary d-block p-3">Kirim Data Paket Travel</button>

                </form>
        </div>
    </div>

</div>

@endSection