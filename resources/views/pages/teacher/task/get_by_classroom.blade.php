@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/task.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h1>Penugasan</h1>
                    <p class="text-muted">Klik tombol dibawah untuk membuat tugas baru.</p>
                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        Buat Tugas
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
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
                                            <h5>{{$task->title}}</h5>
                                            <p class="text-muted">{{$task->course->name}}</p>
                                        </td>
                                        <td>
                                            <h6>Batas pengumpulan</h6>
                                            <p class="text-muted">{{$task->max_date_upload ? $task->max_date_upload : '-'}}</p>

                                        </td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-link btn-sm">
                                                Detail
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
                        <div class="col-3 text-right">Kelas</div>
                        <div class="col-9">
                            <select name="classroom_id" class="form-control">
                                @foreach(\App\Classroom::orderBy('name', 'asc')->get() as $classroom)
                                    <option value="{{$classroom->id}}">
                                        {{$classroom->name}}
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
