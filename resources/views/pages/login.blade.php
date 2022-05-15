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
                                <h1 class="h4 text-gray-900 mb-4">Login Nomads</h1>
                                @if(session()->has('invalid'))
                                <p class="text-danger">{{ session('invalid') }}</p>
                                @endif
                            </div>

                            <form class="user" method="post" action='/auth/login'>
                                @csrf
                                <div class="form-group">
                                    <label for="userEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control form-control-user"
                                        id="email" name="email" aria-describedby="emailHelp"
                                        placeholder="ex: example@gmail.com" value="{{ old('email') }}" autocomplete>
                                        @error('email')
                                            <div class="is-invalid text-danger fs-5">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control form-control-user"
                                        id="password" name="password" placeholder="ex: 12345" value="{{ old('password') }}">
                                        @error('password')
                                              <div class="is-invalid text-danger fs-5">{{ $message }}</div>
                                        @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                            
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/auth/register">Create an Account!</a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

@endSection