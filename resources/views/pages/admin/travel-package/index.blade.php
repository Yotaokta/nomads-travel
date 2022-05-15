@extends('layouts.admin.admin')

@section('content-admin')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Paket Travel</h1>
        <a href="{{ route('travel-package.create') }}" class="btn btn-primary shadow-sm btn-sm">
            <i class="fas fa-plus fs-sm text-white-50"></i>
            Tambah Paket Travel
        </a>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-reponsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Type</th>
                                <th>Departure Date</th>
                                <th>Duration</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($travels as $travel)
                            <tr>
                                <td>{{ $travel->id }}</td>
                                <td>{{ $travel->title}}</td>
                                <td>{{ $travel->location}}</td>
                                <td>{{ $travel->type}}</td>
                                <td>{{ $travel->departure_date}}</td>
                                <td>{{ $travel->duration}}</td>
                                <td>
                                    <a href="{{ route('travel-package.edit', $travel->id) }}" class="btn btn-warning">
                                        Edit
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('travel-package.destroy', $travel->id) }}" method="post">
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