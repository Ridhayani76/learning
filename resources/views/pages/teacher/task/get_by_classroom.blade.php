@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/task.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h6>Tugas {{date('j F Y', strtotime($date))}}</h6>
                    <h1>Kelas {{$classroom->name}}</h1>
                    <p class="text-muted">Klik tombol dibawah untuk membuat tugas baru.</p>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <span class="d-flex align-items-center">
                            <ion-icon name="add-outline" class="mr-1"></ion-icon> Buat Tugas
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('teacher.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('teacher.task.index')}}">Penugasan ({{date('j F Y', strtotime($date))}})</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kelas {{$classroom->name}}</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title">
                            Daftar Tugas Kelas {{$classroom->name}}
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

                                @foreach($items as $task)
                                    <tr>
                                        <td>
                                            <h6>{{$task->title}}</h6>
                                            <p class="text-muted">{{$task->course->name}}</p>
                                        </td>
                                        <td>
                                            <h6>Batas pengumpulan</h6>
                                            <p class="text-muted">{{$task->max_date_upload ? date('j F Y', strtotime($task->max_date_upload)) : '-'}}</p>
                                        </td>
                                        <td>
                                            <h6>Dokumen Tugas</h6>
                                            <p class="text-muted">
                                                <a href="{{$task->file}}" class="line-0 d-flex align-items-center"><ion-icon name="download-outline" size="small" class="mr-1"></ion-icon> Download</a>
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
                                        <td colspan="6" class="text-center">Tidak ada tugas</td>
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
