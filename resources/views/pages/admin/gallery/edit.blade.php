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
                <form class="d-flex flex-column" action="{{ route('galleries.update', $gallery->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="alert alert-primary" role="alert">
                        Saat ini Anda sedang mengubah gambar untuk <b>{{ $gallery->travel_package->title }}</b>
                    </div>
                    <input type="text" class="form-control" name="travel_package_id" id="travel_package_id" value="{{ $gallery->travel_package_id }}" readonly>

                    <div class="form-group">
                        <label for="gambartravel" class="form-label">Gambar Travel</label>
                        <input type="file" name="image" class="form-control" placeholder="extension: jpg, png, jpeg">
                    </div>

                    <button type="submit" class="btn btn-primary d-block p-3">Kirim</button>

                </form>
        </div>
    </div>

</div>

@endSection