@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            {{$task->title}}
                        </div>
                    </div>

                    <div class="card-body">

                        <form action="{{route('teacher.task.create', ['schedule' => $schedule->id])}}">
                            @csrf
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($schedule->tasks as $i => $task)
                                    <tr>
                                        <td>{{$i + 1}}</td>
                                        <td>{{$task->title}}</td>
                                        <td>
                                            <a href="">Lihat</a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>-</td>
                                    <td><input type="text" class="form-control" name="title" placeholder="Judul Tugas"></td>
                                    <td>
                                        <button class="btn btn-primary">Buat Tugas</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
