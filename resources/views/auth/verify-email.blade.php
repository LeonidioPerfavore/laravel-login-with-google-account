@extends('layouts.app')

@section('content')
<section class="gradient-custom">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">

                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                <h2>If you don't receive a notification, send another one in a few minutes.</h2>
                <form method="post" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        Send
                    </button>
                </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
