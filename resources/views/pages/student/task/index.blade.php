@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/task.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h6>Penugasan</h6>
                    <h1>List Tugas Per Mata Kuliah</h1>
                    <p class="text-muted">Kamu memiliki {{$courses->count()}} tugas ditanggal ini.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('teacher.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('teacher.task.index')}}">Penugasan</a></li>
                <li class="breadcrumb-item active" aria-current="page">List Tugas</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title">
                            {{ __('List Tugas Per Mata kuliah') }}
                        </h5>
                    </div>

                    <div class="card-body" style="padding: 0px;">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif

                            <table class="table table-striped" style="margin: 0px;">
                                <tbody>

                                @foreach($courses as $course)
                                    <tr>
                                        <td>
                                            <h6>Mata Kuliah</h6>
                                            <span class="text-muted">
                                                {{$course->name}}
                                            </span>
                                        </td>
                                        <td class="text-center">

                                        </td>
                                    </tr>

                                @endforeach

                                @if($courses->count() == 0)
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada mata kuliah</td>
                                    </tr>
                                @endif

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
                            <input type="text" name="task_id" class="form-control" style="visibility: hidden; position:absolute;" id="task-id">
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

@section('js')
    <script>
        function upload (e, id, course, title) {
            e.preventDefault();
            $('#exampleModal').modal('show');
            $('#task-id').val(id);
            $('#tugas').val(title + ' - ' + course);
        }
    </script>
@endsection
