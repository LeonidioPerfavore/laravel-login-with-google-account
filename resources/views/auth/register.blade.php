@extends('layouts.app')

@section('content')
    <section class="gradient-custom">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Registration</h2>

                                <form method="post" action="{{ route('registration') }}" autocomplete="off">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="emailHelp" placeholder="Enter name">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group pt-1">
                                        <label for="email">Email address</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                        @error('email')
                                        <div class="invalid-feedback pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group pt-1">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter password">
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group pt-1">
                                        <label for="password_confirmation">Confirm password</label>
                                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" placeholder="Confirm password">
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5 mt-4" type="submit">
                                        Submit
                                    </button>

                                </form>

                        </div>

                            <div class="d-flex justify-content-center text-center">
                                <p class="mb-0">
                                    Back to <a href="{{ route('show.login.form') }}" class="text-white-50 fw-bold">Login</a>
                                </p>
                            </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection