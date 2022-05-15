@extends('layouts.checkout')

@section('content-checkout')

<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0 pl-3 pl-lg-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">
                                Paket Travel
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                Details
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Checkout
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">

                    <div class="card card-details mb-3">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="errror">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $errors }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <h1>Who is Going?</h1>
                        <p>
                            Trip to {{ $transactions->travel_package->title }}
                        </p>
                        <div class="attendee">
                            <table class="table table-responsive-sm text-center">
                                <thead>
                                    <tr>
                                        <td scope="col">Picture</td>
                                        <td scope="col">Name</td>
                                        <td scope="col">Nationality</td>
                                        <td scope="col">Visa</td>
                                        <td scope="col">Passport</td>
                                        <td scope="col"></td>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($transactions->transaction_detail as $transaction)
                                    <tr>
                                        <td>
                                            <img class="rounded-circle img-fluid" src="https://ui-avatars.com/api/?name={{ $transaction->username }}" alt="" height="60" />
                                        </td>
                                        <td class="align-middle">{{ $transaction->username }}</td>
                                        <td class="align-middle">{{ $transaction->nationality }}</td>
                                        <td class="align-middle">{{ $transaction->is_visa ? '30 Days' : 'N/A' }}</td>
                                        <td class="align-middle">
                                            {{ \Carbon\Carbon::createFromDate($transaction->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}
                                        </td>
                                        <td class="align-middle">
                                            <a href=" {{ route('checkout.remove', $transaction->id) }}">
                                                <img src="{{ url('/images/ic_remove.png') }}" alt="" />
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td collspan="6" class="text-center">No Visitor</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                        <div class="member mt-3">
                            <h2>Add Member</h2>

                            <form class="form-inline" method="post" action="{{ route('checkout.create', $transactions->id) }}">
                                @csrf
                                <label class="sr-only" for="inputUsername">Name</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" name="username" id="inputUsername"
                                    placeholder="Username" />

                                <label class="sr-only" for="inputNationality">Nationality</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" name="nationality" id="inputNationality"
                                    placeholder="ex: ID for Indonesia" />

                                <label class="sr-only" class="mr-2"
                                    for="inlineFormCustomSelectPref">Preference</label>
                                <select class="custom-select mb-2 mr-sm-2" name="is_visa" id="inlineFormCustomSelectPref">
                                    <option selected value="">VISA</option>
                                    <option value="1">30 Days</option>
                                    <option value="0">N/A</option>
                                </select>

                                <label class="sr-only" for="doePassport">DOE Passport</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="date" class="form-control datepicker" name="doe_passport" id="doePassport"
                                        placeholder="DOE Passport" />
                                </div>

                                <button type="submit" class="btn btn-add-now mb-2 px-4">
                                    Add Now
                                </button>
                            </form>
                            <h3 class="mt-2 mb-0">Note</h3>
                            <p class="disclaimer mb-0">
                                You are only able to invite member that has registered in
                                Nomads.
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Checkout Information</h2>
                        <table class="trip-informations">
                            <tr>
                                <th width="50%">Members</th>
                                <td width="50%" class="text-right">{{ $transactions->transaction_detail->count() }} person</td>
                            </tr>
                            <tr>
                                <th width="50%">Additional Visa</th>
                                <td width="50%" class="text-right">Rp. {{ $transactions->additional_visa }}</td>
                            </tr>
                            <tr>
                                <th width="50%">Trip Price</th>
                                <td width="50%" class="text-right">Rp. {{ $transactions->travel_package->price }} / person</td>
                            </tr>
                            <tr>
                                <th width="50%">Sub Total</th>
                                <td width="50%" class="text-right">Rp. {{ $transactions->transactional_total }}</td>
                            </tr>
                            <tr>
                                <th width="50%">Total (+Unique)</th>
                                <td width="50%" class="text-right text-total">
                                    <span class="text-blue">Rp. {{ $transactions->transactional_total + mt_rand(0,99) }}</span>
                                </td>
                            </tr>
                        </table>

                        <hr />
                        <h2>Payment Instructions</h2>
                        <p class="payment-instructions">
                            Please complete your payment before to continue the wonderful
                            trip
                        </p>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img src="{{ url('/images/ic_bank.png') }}" alt="" class="bank-image" />
                                <div class="description">
                                    <h3>PT Nomads ID</h3>
                                    <p>
                                        0881 8829 8800
                                        <br />
                                        Bank Central Asia
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bank-item">
                                <img src="{{ url('/images/ic_bank.png') }}" alt="" class="bank-image" />
                                <div class="description">
                                    <h3>PT Nomads ID</h3>
                                    <p>
                                        0899 8501 7888
                                        <br />
                                        Bank HSBC
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="join-container">
                        <a href="{{ route('checkout.success', $transactions->id) }}" class="btn btn-block btn-join-now mt-3 py-2">I Have Made Payment</a>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('home') }}" class="text-muted">Cancel Booking</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endSection
