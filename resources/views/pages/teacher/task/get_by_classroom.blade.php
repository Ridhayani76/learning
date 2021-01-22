@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/task.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h6 class="d-flex align-items-center">
                        <ion-icon name="calendar-outline" style="font-size: 18px;" class="mr-2"></ion-icon>
                         {{date('F j D, Y', strtotime($date))}}
                    </h6>
                    <h1>Kelas {{$classroom->name}}</h1>
                    <p class="text-muted">Klik tombol dibawah untuk membuat tugas baru.</p>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <span class="d-flex align-items-center">
                            <ion-icon name="create-outline" class="mr-2"></ion-icon> Buat Tugas
                        </span>
                    </a>
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
                <li class="breadcrumb-item d-flex align-items-center">
                    <a href="{{route('teacher.task.index')}}" class="d-flex align-items-center">
                        <ion-icon name="folder-open-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                        Penugasan
                    </a>
                </li>
                <li class="breadcrumb-item d-flex align-items-center">
                    <a href="{{route('teacher.task.index', ['date' => $date])}}" class="d-flex align-items-center">
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
                    </a>
                </li>
                <li class="breadcrumb-item active d-flex align-items-center" aria-current="page">
                    <ion-icon name="layers-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                    Kelas {{$classroom->name}}
                </li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="card-title mb-1">
                                Daftar Tugas Kelas {{$classroom->name}}
                            </h5>
                            <span class="text-muted">
                                Ada <span class="font-weight-bold">{{$items->count()}} tugas</span> pada
                                @if(date('Y-m-d') == $date)
                                    Hari ini
                                @elseif(date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d')))) == $date)
                                    Kemarin
                                @elseif(date('Y-m-d', strtotime('+1 days', strtotime(date('Y-m-d')))) == $date)
                                    Besok
                                @else
                                    {{date('j F Y', strtotime($date))}}
                                @endif
                                .
                            </span>
                        </div>
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

                                @foreach($items as $task)
                                    <tr>
                                        <td>
                                            <h6>{{$task->title}}</h6>
                                            <span class="d-flex align-items-center text-muted">
                                                <ion-icon name="book-outline" class="mr-2" style="font-size: 14px"></ion-icon> {{$task->course->name}}
                                            </span>
                                        </td>
                                        <td>
                                            <h6>Batas pengumpulan</h6>
                                            <span class="d-flex align-items-center text-muted">
                                                <ion-icon name="calendar-outline" class="mr-2" style="font-size: 14px"></ion-icon> {{$task->max_date_upload ? date('j F Y', strtotime($task->max_date_upload)) : '-'}}
                                            </span>
                                        </td>
                                        <td>
                                            <h6>Form Tugas</h6>
                                            <p class="text-muted">
                                                <a href="{{$task->file}}" class="line-0 d-flex align-items-center">
                                                    <ion-icon name="document-outline" size="small" class="mr-1"></ion-icon> Download Form
                                                </a>
                                            </p>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('teacher.task.show', ['task' => $task->id])}}" class="btn btn-outline-primary btn-sm">
                                                <span class="d-flex align-items-center">
                                                    Lihat <ion-icon name="arrow-forward-outline" class="ml-2"></ion-icon>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach

                                @if($items->count() == 0)
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            Tidak ada tugas di kelas {{$classroom->name}} pada
                                            @if(date('Y-m-d') == $date)
                                                Hari ini
                                            @elseif(date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d')))) == $date)
                                                Kemarin
                                            @elseif(date('Y-m-d', strtotime('+1 days', strtotime(date('Y-m-d')))) == $date)
                                                Besok
                                            @else
                                                {{date('j F Y', strtotime($date))}}
                                            @endif
                                            .
                                        </td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form action="{{route('teacher.task.store')}}" method="POST" enctype="multipart/form-data" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="classroom_id" value="{{$classroom->id}}">

                    <div class="form-group row align-items-center">
                        <div class="col-3 text-right">Mata Kuliah</div>
                        <div class="col-9">
                            <select name="course_id" class="form-control">
                                @foreach(\App\Course::orderBy('name', 'asc')->get() as $course)
                                <option value="{{$course->id}}">
                                    {{$course->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col-3 text-right">Judul Tugas</div>
                        <div class="col-9">
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col-3 text-right">File Tugas</div>
                        <div class="col-9">
                            <input type="file" class="form-control" name="file">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col-3 text-right">Batas Pengumpulan</div>
                        <div class="col-9">
                            <input type="date" class="form-control" name="max_date_upload">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3"></div>
                        <div class="col-9">
                            <button class="btn btn-primary" type="submit">Buat Tugas</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
