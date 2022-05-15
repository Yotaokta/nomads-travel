@extends('layouts.admin.admin')

@section('content-admin')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Galeri</h1>
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
                <form class="d-flex flex-column" action="{{ route('galleries.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="travel_package_id" class="form-label">Nama Package Travel</label>
                        <select class="form-control" name="travel_package_id" id="travelname" required autofocus>
                            <option value="">Pilih Paket Travel</option>
                            @foreach ($travels as $travel)
                                <option value="{{ $travel->id }}">{{ $travel->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="uploadgambar" class="form-label">Tambah Gambar</label>
                        <input class="form-control" type="file" name="image" id="uploadgambar" placeholder="file extention: jpeg, png, jpg">
                    </div>

                    <button type="submit" class="btn btn-primary d-block p-3">Kirim Data Galeri</button>

                </form>
        </div>
    </div>

</div>

@endSection