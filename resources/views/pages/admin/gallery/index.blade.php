@extends('layouts.admin.admin')

@section('content-admin')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Galeri</h1>
        <a href="{{ route('galleries.create') }}" class="btn btn-primary shadow-sm btn-sm">
            <i class="fas fa-plus fs-sm text-white-50"></i>
            Tambah Galeri
        </a>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-reponsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Travel</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($galleries as $gallery)
                            <tr>
                                <td>{{ $gallery->id }}</td>
                                <td>{{ $gallery->travel_package->title}}</td>
                                <td>
                                    <img src="{{ Storage::url($gallery->image) }}" alt="gambar-travel" width="150px" class="image-thumbnail">    
                                </td> 
                                <td>
                                    <a href="{{ route('galleries.edit', $gallery->id ) }}" class="btn btn-warning">
                                        Edit
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('galleries.destroy', $gallery->id) }}" method="post">
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
                                    Data Kosong      
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