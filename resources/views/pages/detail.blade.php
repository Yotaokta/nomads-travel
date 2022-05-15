@extends('layouts.app')

@section('content')

<main>
    <section class="section-details-header"></section>

    <section class="section-details-content">
        <div class="container">
            <div class="row">
            <div class="col p-0 pl-3 pl-lg-0"">
            <nav aria-label=" breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">
                            Travel Package
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $travelWithSlug->title }}
                        </li>
                    </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        <h1>{{ $travelWithSlug->title }}</h1>
                        <p>
                            {{ $travelWithSlug->location }}
                        </p>
                        <div class="gallery">
                            <div class="xzoom-container">
                                  <img class="xzoom" width="128" height="400" id="xzoom-default" src="{{ Storage::url($firstGallery->image) }}"
                                xoriginal="{{ Storage::url($firstGallery->image) }}" />
                                
                                <div class="xzoom-thumbs">
                                    @forelse ($travelGallery as $gallery)
                                    <a href="{{ Storage::url($gallery->image) }}"><img class="xzoom-gallery" width="128"
                                            src="{{ Storage::url($gallery->image) }}"
                                            xpreview="{{ Storage::url($gallery->image) }}" /></a>
                                    @empty
                                    <div class="alert alert-warning" role="alert">
                                       Tidak Gambar Preview Saat Ini
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            <h2>Tentang Wisata</h2>
                            <p>
                                {{ $travelWithSlug->about}}
                            </p>
                            <div class="features row pt-3">
                                <div class="col-md-4">
                                    <img src="{{ url('/images/ic_event.png') }}" alt="" class="features-image" />
                                    <div class="description">
                                        <h3>Featured Ticket</h3>
                                        <p>{{ $travelWithSlug->featured_event }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="{{ url('/images/ic_bahasa.png') }}" alt="" class="features-image" />
                                    <div class="description">
                                        <h3>Language</h3>
                                        <p>{{ $travelWithSlug->language }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="{{ url('/images/ic_foods.png') }}" alt="" class="features-image" />
                                    <div class="description">
                                        <h3>Foods</h3>
                                        <p>{{ $travelWithSlug->food }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Members are going</h2>
                        <div class="members my-2">
                            <img src="{{ url('/images/members.png') }}" alt="" class="w-75" />
                        </div>
                        <hr />
                        <h2>Trip Informations</h2>
                        <table class="trip-informations">
                            <tr>
                                <th width="50%">Date of Departure</th>
                                <td width="50%" class="text-right">{{ $travelWithSlug->departure_date }}</td>
                            </tr>
                            <tr>
                                <th width="50%">Duration</th>
                                <td width="50%" class="text-right">{{ $travelWithSlug->duration }}</td>
                            </tr>
                            <tr>
                                <th width="50%">Type</th>
                                <td width="50%" class="text-right">{{ $travelWithSlug->type }}</td>
                            </tr>
                            <tr>
                                <th width="50%">Price</th>
                                <td width="50%" class="text-right">{{ $travelWithSlug->price }} / person</td>
                            </tr>
                        </table>
                    </div>
                    <div class="join-container">
                        <form action="{{ route('checkout.process', $travelWithSlug->id ) }}" method="POST" >
                            @csrf
                            <button type="submit" class="btn btn-block btn-join-now mt-3 py-2">Join Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endSection

@push('addons-css')
<link rel="stylesheet" href="{{ url('/libraries/xzoom/dist/xzoom.css') }}" />
@endpush

@push('addons-script')
  <script src="{{ url('/libraries/xzoom/dist/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                Xoffset: 15
            });
        });
    </script>
@endpush