@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            Detail Jadwal
                        </div>
                    </div>

                    <div class="card-body p-0">

                       <table class="table table-striped m-0">
                           <tr>
                               <th>Kelas :</th>
                           </tr>
                           <tr>
                               <td>{{$item->classroom->name}}</td>
                           </tr>
                           <tr>
                               <th>Mata Kuliah :</th>
                           </tr>
                           <tr>
                               <td>{{$item->course->name}}</td>
                           </tr>
                           <tr>
                               <th>Tanggal :</th>
                           </tr>
                           <tr>
                               <td>{{$item->created_at->format('d M Y')}}</td>
                           </tr>
                       </table>

                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            Daftar Tugas
                        </div>
                        <div>
                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Buat Tugas</a>
                        </div>
                    </div>

                    <div class="card-body">

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        {{$error}}
                                    @endforeach
                                </div>
                            @endif

                        <form action="{{route('teacher.task.store', ['schedule' => $item->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Tugas</th>
                                    <th class="text-center">Form Tugas</th>
                                    <th class="text-center">Mengumpulkan</th>
                                    <th class="text-center">Persentase</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp

                                @foreach($item->tasks as $task)
                                    <tr>
                                        <td style="vertical-align: middle">{{$i}}</td>
                                        <td style="vertical-align: middle">{{$task->title}}</td>
                                        <td style="vertical-align: middle" class="text-center">
                                            <a class="btn btn-secondary btn-sm" href="{{url(Storage::url($task->file))}}">Download</a>
                                            <a href="" class="btn btn-link btn-sm ml-2">Edit</a>
                                        </td>
                                        <td style="vertical-align: middle" class="text-center">{{$task->task_uploads->count()}}/{{$task->schedule->classroom->students->count()}}</td>
                                        <td style="vertical-align: middle" class="text-center">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{$task->task_uploads->count() / $task->schedule->classroom->students->count() * 100}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$task->task_uploads->count() / $task->schedule->classroom->students->count() * 100}}%</div>
                                            </div>
                                        </td>
                                        <td style="vertical-align: middle" class="text-center">
                                            <a href="" class="btn btn-outline-danger btn-sm mr-2">Hapus</a>
                                            <a href="{{route('teacher.task.show', ['schedule' => $item->id, 'task' => $task->id])}}" class="btn btn-link btn-sm">Lihat Tugas</a>
                                        </td>
                                    </tr>

                                    @php
                                        $i++;
                                    @endphp

                                @endforeach

                                </tbody>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form action="{{route('teacher.task.store', ['schedule' => $item->id])}}" method="POST" enctype="multipart/form-data" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
