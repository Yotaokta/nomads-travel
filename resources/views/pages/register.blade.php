@extends('layouts.auth')

@section('content-auth')

<div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">

                <div class="row justify-content-center">

                    <div class="col-lg-11">
                        <div class="p-5">

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                            <form class="user" method="post" action="/auth/register">
                                @csrf
                                <div class="form-group">
                                    <label for="nama" class="form-label">Username</label>
                                        <input type="text" class="form-control form-control-user" value="{{ old('username') }}" id="username" name="username"
                                            placeholder="ex: budi123">
                                         @error('username')
                                            <div class="is-invalid text-danger fs-5">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="emailRegis" class="form-label">Email</label>
                                    <input type="email" class="form-control form-control-user" value="{{ old('email') }}" id="email" name="email"
                                        placeholder="ex: example@gmail.com">
                                          @error('email')
                                            <div class="is-invalid text-danger fs-5">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control form-control-user"
                                        id="password" name="password" placeholder="ex: 12345">
                                          @error('password')
                                            <div class="is-invalid text-danger fs-5">{{ $message }}</div>
                                        @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="/auth/login">Already have an account? Login!</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endSection