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
                    <ion-icon name="book-outline" style="font-size: 18px;" class="mr-2"></ion-icon>
                    {{ $task->course->name }}
                </h6>
                <h1>
                    {{ $task->title }}
                    <small class="text-muted">
                        - Kelas {{ $task->classroom->name }}
                    </small>
                </h1>
                <p class="text-muted">Klik tombol dibawah untuk mendownload form/dokumen tugas.</p>
                <a href="{{url(Storage::url($task->file))}}" target="_blank" class="btn btn-primary mr-2">
                    <span class="d-flex align-items-center">
                        <ion-icon name="document-outline" class="mr-1"></ion-icon> Lihat form tugas
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
            <li class="breadcrumb-item">
                <a href="{{route('teacher.task.index')}}" class="d-flex align-items-center text-primary">
                    <ion-icon name="folder-open-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                    Penugasan ({{date('j F Y', strtotime($task->created_at))}})
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('teacher.task.get_by_classroom', ['classroom' => $task->classroom_id, 'date' => date('Y-m-d', strtotime($task->created_at))])}}" class="d-flex align-items-center">
                    <ion-icon name="layers-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                    Kelas {{$task->classroom->name}}
                </a>
            </li>
            <li class="breadcrumb-item active d-flex align-items-center" aria-current="page">
                <ion-icon name="scan-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                {{ $task->title }}
            </li>
        </ol>
    </nav>

    @include('layouts.message')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="">
                        <h5 class="card-title mb-1">
                            List status pengumpulan tugas
                        </h5>
                        <span class="text-muted d-flex align-items-center">
                            <span class="text-primary d-flex align-items-center">
                                <span class="font-weight-bold mr-1">{{$task->countAssessed()}}</span> Dinilai
                            </span>

                            <ion-icon name="ellipse" class="mx-2" style="font-size: 6px;"></ion-icon>

                            <span class="text-success d-flex align-items-center">
                                <span class="font-weight-bold mr-1">{{$task->countUpload()}}</span> Belum dinilai
                            </span>

                            <ion-icon name="ellipse" class="mx-2" style="font-size: 6px;"></ion-icon>

                            <span class="text-info d-flex align-items-center">
                                <span class="font-weight-bold mr-1">{{$task->countNotupload()}}</span> Belum mengumpulkan.
                            </span>
                        </span>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="form-group mr-3" style="margin: 0px;">
                            <small class="text-muted">Urutkan</small>
                            <select name="" id="" class="form-control" style="width: 200px;">
                                <option value="">Nama (asc)</option>
                                <option value="">Nama (desc)</option>
                                <option value="">Nilai Tertingi</option>
                                <option value="">Nilai Terendah</option>
                                <option value="">Paling Awal Mengumpulkan</option>
                                <option value="">Paling Akhir Mengumpulkan</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin: 0px;">
                            <small class="text-muted">Filter</small>
                            <select name="" id="" class="form-control" style="width: 200px;">
                                <option value="">Semua</option>
                                <option value="">Belum mengumpulkan</option>
                                <option value="">Mengumpulkan</option>
                                <option value="">Telah dinilai</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="border-top: 1px solid #dee2e6;">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" data-toggle="bottom" data-placement="right" title="Telah dinilai" role="progressbar" style="width: {{$task->countAssessed()/$task->classroom->students->count() * 100}}%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                            {{$task->countAssessed()/$task->classroom->students->count() * 100}}%
                        </div>
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" data-toggle="bottom" data-placement="bottom" title="Belum dinilai" role="progressbar" style="width: {{$task->countUpload()/$task->classroom->students->count() * 100}}%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                            {{$task->countUpload()/$task->classroom->students->count() * 100}}%
                        </div>
                        <div class="progress-bar bg-info" role="progressbar" data-toggle="tooltip" data-placement="bottom" title="Belum mengumpulkan" style="width: {{$task->countNotupload()/$task->classroom->students->count() * 100}}%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            {{$task->countNotupload()/$task->classroom->students->count() * 100}}%
                        </div>
                    </div>
                </div>

                <div class="card-body" style="padding: 0px;">

                    <table class="table table-striped">
                        <tbody>
                            @foreach($students as $i => $student)
                            <tr>
                                <td class="text-center" style="width: 80px;">
                                    {{-- <img src="{{Avatar::create($student->name)->setDimension(50)->setFontSize(18)->toBase64()}}" />--}}
                                    <img src="https://randomuser.me/api/portraits/men/{{$i+1}}.jpg" width="50px" height="50px" style="border-radius: 50%;">
                                </td>
                                <td>
                                    <h6 class="key">{{$student->name}}</h6>
                                    <span class="text-muted" style="letter-spacing: 1.2px; font-weight: 500;">{{$student->nim ? $student->nim : '-'}}</span>
                                </td>
                                <td>
                                    <h6 class="key">Status</h6>
                                    @if($task->hasUploaded($student->id))
                                    <span class="badge badge-success">
                                        <span class="d-flex align-items-center">
                                            <ion-icon name="mail-open-outline" class="mr-1" style="font-size: 12px;"></ion-icon>
                                            Mengumpulkan
                                        </span>
                                    </span>
                                    @elseif($task->hasAssessed($student->id))
                                    <span class="badge badge-primary">
                                        <span class="d-flex align-items-center">
                                            <ion-icon name="checkmark-outline" class="mr-1" style="font-size: 12px;"></ion-icon>
                                            Dinilai
                                        </span>
                                    </span>
                                    @else
                                    <span class="badge badge-info">
                                        <span class="d-flex align-items-center">
                                            <ion-icon name="alert-circle-outline" class="mr-1" style="font-size: 12px;"></ion-icon>
                                            Belum Mengumpulkan
                                        </span>
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    @if($task->hasUploaded($student->id))
                                    <h6 class="key">Tanggal submit</h6>
                                    <span class="text-muted" style="font-size: 12px;">
                                        {{$task->hasUploaded($student->id)->created_at->diffForHumans()}}
                                    </span>
                                    @endif

                                    @if($task->hasAssessed($student->id))
                                    <h6>Nilai</h6>
                                    <span class="text-primary">
                                        <span style="letter-spacing: 1.2px; font-weight: bold;">
                                            {{$task->hasAssessed($student->id)->score}}
                                        </span>
                                        <small>({{$task->hasAssessed($student->id)->scoreTitle}})</small>
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    @if($task->hasUploaded($student->id))
                                    <a href="{{url(Storage::url($task->hasUploaded($student->id)->file))}}" data-toggle="tooltip" title="Lihat hasil pengerjaan" data-placement="top" class="btn btn-primary mr-2" style="padding: 10px;">
                                        <span class="d-flex align-items-center">
                                            <ion-icon name="open-outline"></ion-icon>
                                        </span>
                                    </a>
                                    <a href="#" class="btn btn-outline-primary" onclick="assess(event, '{{$task->title}}', '{{$task->course->name}}', '{{$student->name}}', '{{$student->nim}}', {{$task->hasUploaded($student->id)->id}}, {{isset($task->hasUploaded($student->id)->assessment) ? $task->hasUploaded($student->id)->assessment->score : '0'}})">
                                        <span class="d-flex align-items-center">
                                            <ion-icon name="create-outline" class="mr-2"></ion-icon> Nilai
                                        </span>
                                    </a>
                                    @elseif($task->hasAssessed($student->id))
                                    <a href="{{url(Storage::url($task->hasAssessed($student->id)->task_upload->file))}}" data-toggle="tooltip" title="Lihat hasil pengerjaan" data-placement="top" class="btn btn-primary mr-2" style="padding: 10px;">
                                        <span class="d-flex align-items-center">
                                            <ion-icon name="open-outline"></ion-icon>
                                        </span>
                                    </a>
                                    <a href="#" class="btn btn-outline-primary" onclick="assess(event, '{{$task->title}}', '{{$task->course->name}}', '{{$student->name}}', '{{$student->nim}}', {{$task->hasAssessed($student->id)->task_upload->id}}, {{$task->hasAssessed($student->id)->score}})">
                                        <span class="d-flex align-items-center">
                                            <ion-icon name="create-outline" class="mr-2"></ion-icon> Nilai
                                        </span>
                                    </a>
                                    @endif
                                    {{-- <form action="{{route('teacher.assessment.store')}}" method="POST" style="width: 100%;">--}}
                                    {{-- @csrf--}}

                                    {{-- @if($task->hasUploaded($student->id))--}}
                                    {{-- <input type="hidden" name="task_upload_id" value="{{$task->hasUploaded($student->id)->id}}">--}}
                                    {{-- @endif--}}

                                    {{-- <div class="input-group input-group-sm">--}}
                                    {{-- <input type="number" name="score" class="form-control text-center" value="{{$task->hasUploaded($student->id) ? $task->hasUploaded($student->id)->assessment ? $task->hasUploaded($student->id)->assessment->score : 0 : 0}}" {{!$task->hasUploaded($student->id) ? 'disabled' : ''}} style="width: 0px;">--}}
                                    {{-- <div class="input-group-append">--}}
                                    {{-- <button type="submit" class="btn btn-outline-success" type="button">Update</button>--}}
                                    {{-- </div>--}}
                                    {{-- </div>--}}
                                    {{-- </form>--}}
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
            <div class="modal-header" style="border-bottom: 0px;">
                <h5 class="modal-title" id="exampleModalLabel" style="margin-bottom: 0px;">Input Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <ion-icon name="close-outline"></ion-icon>
                    </span>
                </button>
            </div>
            <div class="modal-body" style="padding: 0px;">

                <input type="hidden" name="task_upload_id" id="task-upload-id">

                <table class="table table-bordered" style="margin: 0px;">
                    <tr>
                        <td>
                            <h6 id="student-name">Ahmad Irfan Maulana</h6>
                            <span class="text-info" style="letter-spacing: 1.2px; font-weight: bold;" id="student-nis">298239</span>
                        </td>
                        <td>
                            <h6 id="task-title">HTML</h6>
                            <span style="margin-bottom: 0px;" id="task-course">Web Programming</span>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td>
                            <a href="" title="Lihat submit tugas" class="btn btn-outline-primary btn-block">
                                <div class="d-flex align-items-center justify-content-center">
                                    <ion-icon name="document-text-outline" class="mr-2"></ion-icon> Lihat Tugas
                                </div>
                            </a>
                        </td>
                        <td>
                            <h6>Catatan</h6>
                            <div>-</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h6>Nilai</h6>
                            <input type="number" id="task-score" name="score" max="100" min="0" class="mb-4 form-control" placeholder="0-100">
                            <button class="btn btn-primary" type="submit">
                                <div class="d-flex align-items-center justify-content-center">
                                    <ion-icon name="create-outline" class="mr-2"></ion-icon> Perbarui nilai
                                </div>
                            </button>
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
    function assess(e, title, course, name, nim, task_upload_id, score) {
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