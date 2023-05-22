@extends('layouts.app')

@section('content')
    <section class="gradient-custom">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Forgot password</h2>

                                @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    We have emailed you reset password link
                                </div>
                                @endif

                                <form method="post" action="{{ route('forgot.password.request') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input
                                                type="email" name="email" value="{{old('email')}}"
                                                class="form-control @error('email') is-invalid @enderror"
                                                id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <button class="btn btn-outline-light btn-lg px-5 mt-3" type="submit">
                                        Submit
                                    </button>

                                    <div class="mt-2">
                                        <p class="mb-0">
                                            <a href="{{route('show.registration.form')}}" class="text-white-50 fw-bold">Sign Up</a>
                                            |
                                            <a href="{{route('show.login.form')}}" class="text-white-50 fw-bold">Login</a>
                                        </p>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
