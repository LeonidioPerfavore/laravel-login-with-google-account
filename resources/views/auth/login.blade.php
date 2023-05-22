@extends('layouts.app')

@section('content')
        <section class="gradient-custom">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">

                                    @if(session('status'))
                                        <div class="invalid-feedback">{{session('status')}}</div>
                                    @endif

                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                    <form method="post" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input
                                                    type="email" name="email" value="{{ old('email') }}"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" value="{{ old('password') }}"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" placeholder="Password">
                                            @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="flex items-center justify-between py-2">
                                            <div class="flex items-center gap-2">
                                                <input type="checkbox" id="remember" name="remember" class="rounded">
                                                <label class="form-check-label" for="remember">
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>

                                        <p class="small mb-5 pb-lg-2 mt-4">
                                            <a class="text-white-50" href="{{route('showForgotPasswordForm')}}">Forgot password?</a>
                                        </p>

                                        @if ($errors->has('wrong_credentials'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('wrong_credentials') }}
                                            </div>
                                        @endif

                                        <button class="btn btn-outline-light btn-lg px-4" type="submit">
                                                Login
                                        </button>
                                    </form>

                                    <div class="d-flex justify-content-center text-center mt-2 pt-1">
{{--                                        <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>--}}
{{--                                        <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>--}}
                                        <a href="{{ route('google.login' )}}" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                    </div>

                                        <div class="mt-2">
                                            <p class="mb-0">Don't have an account? <a href="{{route('show.registration.form')}}" class="text-white-50 fw-bold">Sign Up</a>
                                            </p>
                                        </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
