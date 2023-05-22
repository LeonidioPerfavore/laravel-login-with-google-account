@extends('layouts.app')

@section('content')
    <section class="gradient-custom">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Change password</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                @if(session('status'))
                                    <div class="invalid-feedback">AAAAA{{session('status')}}</div>
                                @endif

                                <form method="POST" action="{{ route('password.reset.request') }}">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $request->token }}">

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input
                                                type="email" name="email" value="{{ old('email', $request->email) }}"
                                                class="form-control @error('email') is-invalid @enderror"
                                                id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="password">Password</label>
                                        <input
                                                type="password" name="password" value="{{ old('password') }}"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" placeholder="Password">
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="password_confirmation">Confirm password</label>
                                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" placeholder="Password">
                                    </div>

                                    @if ($errors->has('wrong_credentials'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('wrong_credentials') }}
                                        </div>
                                    @endif

                                    <button class="btn btn-outline-light btn-lg px-5 mt-4" type="submit">
                                        Submit
                                    </button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
