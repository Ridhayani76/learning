@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/practice.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h2>Welcome back {{Auth()->user()->teacher->name}}</h2>
                    <h5 class="mb-5">Have a nice day :)</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Halo {{Auth::user()->teacher->name}}. Selamat Datang di Aplikasi {{env('APP_NAME')}}.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
