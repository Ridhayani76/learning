@extends('layouts.app')

@section('content')
<div class="jumbotron" style="margin-top: 30px;">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-4">
                <img src="{{asset('img/undraw_happy_announcement_re_tsm0.svg')}}" alt="" class="hero-image">
            </div>
            <div class="col-md-8">
                <h5>Selamat datang,</h5>
                <h1>{{Auth()->user()->student->name}}</h1>
                <p class="text-muted d-flex align-items-center">Semoga harimu menyenangkan <ion-icon name="happy-outline" style="font-size: 18px;" class="ml-1"></ion-icon>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4">
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

                    <p class="text-muted" style="margin-bottom: 0px;">
                        Halo {{Auth::user()->student->name}}, Selamat Datang di Aplikasi {{env('APP_NAME')}}.
                        Aplikasi {{env('APP_NAME')}} merupakan platform blablabla. Peran kamu disini sebagai Teacher/Guru.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title mb-1">

                            Tugas Hari ini
                        </h5>
                        <span style="font-size: 12px" class="text-muted d-flex align-items-center">
                            <ion-icon name="calendar-outline" style="font-size: 14px;" class="mr-2"></ion-icon> {{date('j F Y')}}.
                        </span>
                    </div>

                    <a href="" class="btn btn-outline-primary">
                        <span class="d-flex align-items-center">
                            Semua
                            <ion-icon name="arrow-forward-outline" class="ml-2"></ion-icon>
                        </span>
                    </a>
                </div>

                <div class="card-body" style="padding: 0px;">

                    <table class="table table-striped" style="margin: 0px;">
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>
                                    <h6>{{$task->title}}</h6>
                                    <span class="d-flex align-items-center text-muted">
                                        <ion-icon name="book-outline" class="mr-2" style="font-size: 14px"></ion-icon> {{$task->course->name}}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('teacher.task.show', ['task' => $task->id])}}" class="btn btn-link btn-sm">
                                        <span class="d-flex align-items-center">
                                            Buka <ion-icon name="open-outline" class="ml-2"></ion-icon>
                                        </span>
                                    </a>
                                </td>
                            </tr>

                            @endforeach

                            @if($tasks->count() == 0)
                            <tr>
                                <td colspan="6" class="text-center">
                                    Tidak ada tugas hari ini
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection