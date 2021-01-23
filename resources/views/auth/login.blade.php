@extends('layouts.app')

@section('content')
<div class="jumbotron" style="margin-top: 30px;">
    <div class="container">
        <div class="row d-flex align-items-end">
            <div class="col-md-4">
                <img src="{{asset('img/practice.svg')}}" alt="" class="hero-image">
            </div>
            <div class="col-md-8">
                <h1 class="mb-3">Sign In</h1>
                <p class="text-muted ">Masukan username dan password yang valid <br> untuk masuk ke sistem.</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="username" placeholder="Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">

                            <div class="col-md-12">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary d-flex align-items-center">
                                    {{ __('Login') }}
                                    <ion-icon name="log-in-outline" class="ml-2"></ion-icon>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
