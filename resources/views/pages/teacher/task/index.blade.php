@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/task.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h6>{{$dateDisplay}}.</h6>
                    <h1>Penugasan</h1>
                    <p class="text-muted">Klik detail untuk melihat list tugas dari kelas yang dipilih.</p>

                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('teacher.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Penugasan ({{date('j F Y', strtotime($date))}})</li>
            </ol>
        </nav>

        <div class="row justify-content-center">

            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title mr-3">
                            <span class="font-weight-bold">{{date('F', strtotime($date))}} <span class="text-muted">{{date('j D, Y', strtotime($date))}}</span></span>
                        </h5>

                        <div>
                            <a href="{{route('teacher.task.index', ['date' => $prev])}}" class="btn btn-outline-primary btn-sm line-0 mr-1" style="padding: 8px;">
                                <ion-icon name="chevron-back-outline" size="small"></ion-icon>
                            </a>
                            <a href="{{route('teacher.task.index', ['date' => $next])}}" class="btn btn-outline-primary btn-sm line-0" style="padding: 8px;">
                                <ion-icon name="chevron-forward-outline" size="small"></ion-icon>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title">
                            Daftar Tugas Perkelas <small class="text-primary">({{$amount_of_tasks}} Tugas hari ini)</small>
                        </h5>
                    </div>

                    <div class="card-body" style="padding: 0px">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif

                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-striped" style="margin: 0px;">
                                <tbody>

                                @foreach($classrooms as $classroom)
                                    <tr>
                                        <td style="vertical-align: middle">
                                            <h6>Kelas</h6>
                                            <span class="value">{{$classroom->name}}</span>
                                        </td>
                                        <td>
                                            <h6>Jumlah Tugas</h6>
                                            <span class="value">{{$classroom->tasks->count()}}</span>
                                        </td>
                                        <td style="vertical-align: middle" class="text-center">
                                            <a href="{{route('teacher.task.get_by_classroom', ['classroom' => $classroom->id, 'date' => $date])}}" class="btn btn-primary">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
