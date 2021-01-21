@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/dashboard.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h5>Selamat datang</h5>
                    <h2>{{Auth()->user()->teacher->name}}</h2>
                    <p class="text-muted d-flex align-items-center">Semoga harimu menyenangkan <ion-icon name="happy-outline" style="font-size: 18px;" class="ml-1"></ion-icon></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between" style="border-bottom: 1px solid #eee;">
                        <h5 class="card-title">
                            Tentang Aplikasi
                        </h5>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p class="text-muted">
                            Halo {{Auth::user()->teacher->name}}, Selamat Datang di Aplikasi {{env('APP_NAME')}}.
                            Aplikasi {{env('APP_NAME')}} merupakan platform blablabla. Peran kamu disini sebagai Teacher/Guru.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
