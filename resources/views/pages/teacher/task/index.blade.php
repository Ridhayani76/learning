@extends('layouts.app')

@section('content')
<div class="jumbotron" style="margin-top: 30px;">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-4">
                <img src="{{asset('img/undraw_exams_g-4-ow.svg')}}" alt="" class="hero-image">
            </div>
            <div class="col-md-8">
                <h6 class="d-flex align-items-center">
                    <ion-icon name="calendar-outline" style="font-size: 18px;" class="mr-2"></ion-icon>
                    {{$dateDisplay}}
                </h6>
                <h1>Penugasan</h1>
                <p class="text-muted">Klik detail untuk melihat list tugas berdasarkan kelas yang dipilih.</p>

            </div>
        </div>
    </div>
</div>

<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('teacher.dashboard')}}" class="d-flex align-items-center text-primary">
                    <ion-icon name="home-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                    Home
                </a>
            </li>
            <li class="breadcrumb-item active d-flex align-items-center" aria-current="page">
                <ion-icon name="folder-open-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                Penugasan
            </li>
            <li class="breadcrumb-item active d-flex align-items-center" aria-current="page">
                <ion-icon name="calendar-clear-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                @if(date('Y-m-d') == $date)
                Hari ini
                @elseif(date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d')))) == $date)
                Kemarin
                @elseif(date('Y-m-d', strtotime('+1 days', strtotime(date('Y-m-d')))) == $date)
                Besok
                @else
                {{date('j F Y', strtotime($date))}}
                @endif
            </li>
        </ol>
    </nav>

    <div class="row justify-content-center">

        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mr-4">
                            <span>
                                @if(date('Y-m-d') == $date)
                                Hari ini
                                @elseif(date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d')))) == $date)
                                Kemarin
                                @elseif(date('Y-m-d', strtotime('+1 days', strtotime(date('Y-m-d')))) == $date)
                                Besok
                                @else
                                {{date('F', strtotime($date))}} <span class="text-muted">{{date('j D, Y', strtotime($date))}}</span>
                                @endif
                            </span>
                        </h5>

                        <div>
                            <a href="{{route('teacher.task.index', ['date' => $prev])}}" class="btn btn-outline-primary btn-sm line-0 mr-1" style="padding: 8px;">
                                <ion-icon name="chevron-back-outline" style="font-size: 12px;"></ion-icon>
                            </a>
                            <a href="{{route('teacher.task.index', ['date' => $next])}}" class="btn btn-outline-primary btn-sm line-0" style="padding: 8px;">
                                <ion-icon name="chevron-forward-outline" style="font-size: 12px;"></ion-icon>
                            </a>
                        </div>
                    </div>

                    <div>
                        <button class="btn btn-outline-secondary">
                            <span class="d-flex align-items-center" style="font-size: 12px;">
                                <ion-icon name="calendar-clear-outline" class="mr-2" style="font-size: 14px;"></ion-icon>
                                {{date('j F Y', strtotime($date))}}
                            </span>
                        </button>
                    </div>

                </div>

            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">
                        Daftar Tugas Perkelas <small class="text-primary">({{$amount_of_tasks}} Tugas)</small>
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
                                        <h6>Tugas</h6>
                                        <span class="d-flex align-items-center">
                                            <ion-icon name="layers-outline" class="mr-2" style="font-size: 14px"></ion-icon> Kelas {{$classroom->name}}
                                        </span>
                                    </td>
                                    <td>
                                        <h6>Total Murid</h6>
                                        <span class="d-flex align-items-center text-muted">
                                            <ion-icon name="people-outline" class="mr-2" style="font-size: 14px"></ion-icon> {{$classroom->students->count()}} murid
                                        </span>
                                    </td>
                                    <td>
                                        <h6>Jumlah</h6>
                                        <span class="d-flex align-items-center text-muted">
                                            <ion-icon name="folder-open-outline" class="mr-2" style="font-size: 14px"></ion-icon> {{$classroom->tasks->count()}} tugas
                                        </span>
                                    </td>
                                    <td style="vertical-align: middle" class="text-center">
                                        <a href="{{route('teacher.task.get_by_classroom', ['classroom' => $classroom->id, 'date' => $date])}}" class="btn btn-outline-primary">
                                            <span class="d-flex align-items-center">
                                                Detail
                                                <ion-icon name="arrow-forward-outline" class="ml-2"></ion-icon>
                                            </span>
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


@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection