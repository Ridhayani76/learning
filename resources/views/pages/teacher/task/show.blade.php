@extends('layouts.app')

@section('content')

    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/task.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h6>{{ $task->course->name }}</h6>
                    <h1>{{ $task->title }} <small class="text-muted">- Kelas {{ $task->classroom->name }}</small></h1>
                    <p class="text-muted">Klik tombol dibawah untuk mendownload form/dokumen tugas.</p>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <span class="d-flex align-items-center">
                            <ion-icon name="document-outline" class="mr-1"></ion-icon> Lihat form tugas
                        </span>
                    </a>
                    <a href="" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
                        <span class="d-flex align-items-center">
                            <ion-icon name="create-outline" class="mr-1"></ion-icon> Edit Tugas
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        @include('layouts.message')

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('teacher.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('teacher.task.index')}}">Penugasan ({{date('j F Y', strtotime($task->created_at))}})</a></li>
                <li class="breadcrumb-item"><a href="{{route('teacher.task.get_by_classroom', ['classroom' => $task->classroom_id, 'date' => date('Y-m-d', strtotime($task->created_at))])}}">Kelas {{$task->classroom->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title">
                            List status pengumpulan tugas
                        </h5>
                    </div>

                    <div class="card-body" style="padding: 0px;">

                        <table class="table table-striped">
                            <tbody>
                            @foreach($students as $i => $student)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{Avatar::create($student->name)->setDimension(50)->setFontSize(18)->toBase64()}}" />
                                    </td>
                                    <td>
                                        <h6 class="key">{{$student->name}}</h6>
                                        <span class="value">{{$student->nim ? $student->nim : '-'}}</span>
                                    </td>
                                    <td>
                                        <h6 class="key">Status</h6>
                                        @if($task->hasUploaded($student->id))
                                            <span class="badge badge-{{isset($task->hasUploaded($student->id)->assessment) ? 'success' : 'warning'}}">
                                                {{isset($task->hasUploaded($student->id)->assessment) ? 'Telah Dinilai' : 'Mengumpulkan'}}
                                            </span>
                                        @else
                                            <span class="badge badge-secondary">
                                                Belum Mengumpulkan
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <h6>Nilai</h6>
                                        @if(isset($task->hasUploaded($student->id)->assessment))
                                            <span>
                                                {{$task->hasUploaded($student->id)->assessment->score}}
                                            </span>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <h6 class="key">Submit Pada</h6>
                                        <span class="text-muted" style="font-size: 12px;">
                                            @if($task->hasUploaded($student->id))
                                                {{$task->hasUploaded($student->id)->created_at->diffForHumans()}}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                    <td class="">
                                        @if($task->hasUploaded($student->id))
                                            <a href="{{url(Storage::url($task->hasUploaded($student->id)->file))}}" title="Lihat submit tugas" class="btn btn-primary mr-2" style="padding: 10px;">
                                                <span class="d-flex align-items-center">
                                                    <ion-icon name="document-text-outline"></ion-icon>
                                                </span>
                                            </a>
                                            <a href="#" class="btn btn-outline-primary" onclick="assess(event, '{{$task->title}}', '{{$task->course->name}}', '{{$student->name}}', '{{$student->nim}}', {{$task->hasUploaded($student->id)->id}}, {{isset($task->hasUploaded($student->id)->assessment) ? $task->hasUploaded($student->id)->assessment->score : '0'}})">
                                                <span class="d-flex align-items-center">
                                                    <ion-icon name="create-outline" class="mr-2"></ion-icon> Nilai
                                                </span>
                                            </a>
                                        @endif
{{--                                        <form action="{{route('teacher.assessment.store')}}" method="POST" style="width: 100%;">--}}
{{--                                            @csrf--}}

{{--                                            @if($task->hasUploaded($student->id))--}}
{{--                                                <input type="hidden" name="task_upload_id" value="{{$task->hasUploaded($student->id)->id}}">--}}
{{--                                            @endif--}}

{{--                                            <div class="input-group input-group-sm">--}}
{{--                                                <input type="number" name="score" class="form-control text-center" value="{{$task->hasUploaded($student->id) ? $task->hasUploaded($student->id)->assessment ? $task->hasUploaded($student->id)->assessment->score : 0 : 0}}" {{!$task->hasUploaded($student->id) ? 'disabled' : ''}} style="width: 0px;">--}}
{{--                                                <div class="input-group-append">--}}
{{--                                                    <button type="submit" class="btn btn-outline-success" type="button">Update</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
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

    <form action="{{route('teacher.assessment.store')}}" method="POST" enctype="multipart/form-data" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="task_upload_id" id="task-upload-id">

                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <h6 id="student-name">Ahmad Irfan Maulana</h6>
                                <span id="student-nis">298239</span>
                            </td>
                            <td>
                                <h6 id="task-title">HTML</h6>
                                <span style="margin-bottom: 0px;" id="task-course">Web Programming</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="" title="Lihat submit tugas" class="btn btn-outline-primary">
                                    <span class="d-flex align-items-center">
                                        <ion-icon name="document-text-outline" class="mr-2"></ion-icon> Lihat tugas
                                    </span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h6>Nilai</h6>
                                <input type="number" id="task-score" name="score" max="100" min="0" class="mb-3 form-control" placeholder="0-100">
                                <button class="btn btn-primary" type="submit">Update Nilai</button>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </form>

@endsection

@section('js')
    <script>
        function assess (e, title, course, name, nim, task_upload_id, score) {
            e.preventDefault();
            $('#exampleModal').modal('show');
            $('#task-upload-id').val(task_upload_id);
            $('#student-name').html(name);
            $('#student-nis').html(nim ? nim : '-');
            $('#task-title').html(title);
            $('#task-course').html(course);

            if (score != 'false')
                $('#task-score').val(score);

            setTimeout(() => {
                $('#task-score').focus();
            }, 500);
        }
    </script>
@endsection
