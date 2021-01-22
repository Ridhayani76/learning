@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/dashboard.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h5>Selamat datang,</h5>
                    <h1>{{Auth()->user()->username}}</h1>
                    <p class="text-muted d-flex align-items-center">Semoga harimu menyenangkan <ion-icon name="happy-outline" style="font-size: 18px;" class="ml-1"></ion-icon></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between" style="border-bottom: 1px solid #eee;">
                        <h5 class="card-title">
                            Total Guru
                        </h5>

                        <a href="{{route('admin.teacher.index')}}" class="btn btn-link" style="padding: 0px;">
                            <span class="d-flex align-items-center">
                                <ion-icon name="arrow-forward-circle-outline"></ion-icon>
                            </span>
                        </a>
                    </div>

                    <div class="card-body">
                        <h1 class="text-center" style="font-size: 40px;">
                            {{ \App\Teacher::count() }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between" style="border-bottom: 1px solid #eee;">
                        <h5 class="card-title">
                            Total Kelas
                        </h5>

                        <a href="{{route('admin.classroom.index')}}" class="btn btn-link" style="padding: 0px;">
                            <span class="d-flex align-items-center">
                                <ion-icon name="arrow-forward-circle-outline"></ion-icon>
                            </span>
                        </a>
                    </div>

                    <div class="card-body">
                        <h1 class="text-center" style="font-size: 40px;">
                            {{ \App\Classroom::count() }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between" style="border-bottom: 1px solid #eee;">
                        <h5 class="card-title">
                            Total Murid
                        </h5>

                        <a href="" class="btn btn-link" style="padding: 0px;">
                            <span class="d-flex align-items-center">
                                <ion-icon name="arrow-forward-circle-outline"></ion-icon>
                            </span>
                        </a>
                    </div>

                    <div class="card-body">
                        <h1 class="text-center" style="font-size: 40px;">
                            {{ \App\Student::count() }}
                        </h1>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
