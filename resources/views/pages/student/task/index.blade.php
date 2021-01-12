@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            {{ __('Tugas') }}
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

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Matkul</th>
                                    <th>Tugas</th>
                                    <th>Dosen</th>
                                    <th class="text-center">Form Tugas</th>
                                    <th class="text-center">Mengupload</th>
                                    <th class="text-center">Nilai</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td>{{$item->course->name}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->course->teacher->name}}</td>
                                    <td class="text-center">
                                        <a href="{{url(Storage::url($item->file))}}" class="btn btn-secondary btn-sm">Download</a>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-{{$item->hasUploaded(auth()->user()->student->id) ? 'success' : 'warning'}}">
                                            {{$item->hasUploaded(auth()->user()->student->id) ? 'Sudah' : 'Belum'}}
                                        </span>
                                    </td>
                                    <td class="text-center">{{$item->hasUploaded(auth()->user()->student->id) ? $item->hasUploaded(auth()->user()->student->id)->assessment ? $item->hasUploaded(auth()->user()->student->id)->assessment->score : '-' : '-'}}</td>
                                    <td class="text-center">
                                        @if($item->hasUploaded(auth()->user()->student->id))
                                            <a href="{{url(Storage::url($item->hasUploaded(auth()->user()->student->id)->file))}}" download="" class="btn btn-block btn-success btn-sm">Download</a>
                                        @else
                                        <button class="btn btn-light btn-block btn-sm" onclick="
                                            document.getElementById('tugas').value = '{{$item->title}} - {{$item->course->name}}';
                                            document.getElementById('task_id').value = '{{$item->id}}';
                                            " data-toggle="modal" data-target="#exampleModal">
                                            Upload
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form action="{{route('student.task.store')}}" method="POST" enctype="multipart/form-data" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <div class="col-3 text-right">Tugas</div>
                        <div class="col-9">
                            <input type="text" name="task_id" class="form-control" style="visibility: hidden; position:absolute;" id="task_id">
                            <input type="text" class="form-control" disabled id="tugas">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col-3 text-right">File</div>
                        <div class="col-9">
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3 text-right">Catatan</div>
                        <div class="col-9">
                            <textarea name="note" class="form-control" id="" cols="30" rows="6" placeholder="Jika ada catatan tambahan, tulis disini.."></textarea>
                            <small class="text-muted">Form catatan bersifat optional</small>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3"></div>
                        <div class="col-9">
                            <button class="btn btn-primary" type="submit">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
