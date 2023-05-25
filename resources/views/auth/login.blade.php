@extends('layout.layout')
@section('main-title', 'LogIn Page')
@section('title', 'LogIn to get more')
@section('content')
    <!-- Section: Design Block -->
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <section class="vh-250">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-40 col-lg-12 col-xl-20">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                            class="img-fluid" alt="Sample image">
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" value="{{ old('email') }}" id="form3Example3"
                            class="form-control form-control-lg" placeholder="Enter Your email address" />
                        <label class="form-label" for="form3Example3">Email address</label>
                    </div>
                    @error('email')
                        <div class="help is-danger">{{ $message }}</div>
                    @enderror
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                            placeholder="Enter password" />
                        <label class="form-label" for="form3Example4">Password</label>

                    </div>

                    {{-- <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Remember me
                            </label>
                        </div>
                        <a href="#!" class="text-body">Forgot password?</a>
                    </div> --}}

                    <div class="text-center text-lg-start mt-14 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </form>
    <style>
        .hero.is-success.is-halfheight {
            background-color: rgba(36, 65, 114, 0.906)
        }
    </style>

@endsection
