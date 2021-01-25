@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/task.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h6 class="d-flex align-items-center" style="line-height: 0;">
                        <ion-icon name="calendar-clear-outline" style="font-size: 16px;" class="mr-1"></ion-icon>
                        @if(date('Y-m-d') == $date)
                            Hari ini
                        @elseif(date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d')))) == $date)
                            Kemarin
                        @elseif(date('Y-m-d', strtotime('+1 days', strtotime(date('Y-m-d')))) == $date)
                            Besok
                        @else
                            {{date('d / m / Y', strtotime($date))}}
                        @endif
                    </h6>
                    <h1>List Tugas</h1>
                    <p class="text-muted">Kamu memiliki {{$courses->count()}} tugas ditanggal ini.</p>
                    <a href="#" onclick="openCalendar(event)" class="btn btn-primary">
                        <span class="d-flex align-items-center">
                            <ion-icon name="calendar-outline" class="mr-2"></ion-icon> Buka Kalender
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
                    <a href="{{route('student.dashboard')}}" class="d-flex align-items-center text-primary">
                        <ion-icon name="home-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                        Home
                    </a>
                </li>
                <li class="breadcrumb-item active d-flex align-items-center" aria-current="page">
                    <ion-icon name="folder-open-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                    Tugas
                </li>
                <li class="breadcrumb-item active d-flex align-items-center" aria-current="page">
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
                </li>
            </ol>
        </nav>

        @include('layouts.message')

        <div class="card card-calendar hide">
            <div class="card-header">
                <a href="" onclick="openCalendar(event)" class="btn btn-outline-primary">
                        <span class="d-flex align-items-center">
                            <ion-icon name="arrow-back-outline" class="mr-1"></ion-icon> Kembali
                        </span>
                </a>
            </div>
            <div class="card-body">
                {!! $calendar->calendar() !!}
            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="card-title mb-1">
                                {{ __('List Tugas') }}
                            </h5>
                            <span class="text-muted">
                                Pada {{date('j F Y', strtotime($date))}} terdapat {{$all_tasks}} tugas.
                            </span>
                        </div>
                    </div>

                    <div class="card-body" style="padding: 0px !important;">

                            <table class="table table-striped" style="margin: 0px;">
                                <tbody>

                                @foreach($courses as $i => $course)
                                    <tr>
                                        <td>
                                            <h6>Mata Kuliah</h6>
                                            <span class="d-flex align-items-center text-muted">
                                                <ion-icon name="book-outline" class="mr-2" style="font-size: 14px"></ion-icon> {{$course->name}}
                                            </span>
                                        </td>
                                        <td>
                                            <h6>Jumlah Tugas</h6>
                                            <span class="d-flex align-items-center text-muted" style="font-weight: 500; letter-spacing: 1.2px;">
                                                <ion-icon name="folder-open-outline" class="mr-2" style="font-size: 14px"></ion-icon> {{$course->tasks->count()}}
                                            </span>
                                        </td>
                                        <td>
                                            <h6>Status</h6>

                                            @if($course->tasks->count() == 0)
                                                <span class="text-muted d-flex align-items-center">
                                                    <ion-icon name="happy-outline" class="mr-2" style="font-size: 14px"></ion-icon>
                                                    Tidak ada tugas.
                                                </span>
                                            @elseif($course->task_finished_percentage == 100)
                                                <span class="text-primary d-flex align-items-center">
                                                    <ion-icon name="checkmark-outline" class="mr-2" style="font-size: 14px"></ion-icon>
                                                    Sudah dinilai semua.
                                                </span>
                                            @elseif($course->task_submited_percentage == 100)
                                                <span class="text-success d-flex align-items-center">
                                                    <ion-icon name="navigate-circle-outline" class="mr-2" style="font-size: 14px"></ion-icon>
                                                    Sudah dikerjakan semua.
                                                </span>
                                            @elseif($course->task_unsubmited_percentage == 100)
                                                <span class="text-danger d-flex align-items-center">
                                                    <ion-icon name="warning-outline" class="mr-2" style="font-size: 14px"></ion-icon>
                                                    Belum dikerjakan semua.
                                                </span>
                                            @else
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" data-toggle="tooltip" data-placement="bottom" title="Telah dinilai" role="progressbar" style="width: {{$course->task_finished_percentage}}%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                                        {{$course->task_finished_percentage}}%
                                                    </div>
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" data-toggle="tooltip" data-placement="bottom" title="Belum dinilai" role="progressbar" style="width: {{$course->task_submited_percentage}}%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                                                        {{$course->task_submited_percentage}}%
                                                    </div>
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" data-toggle="tooltip" data-placement="bottom" title="Belum mengumpulkan" style="width: {{$course->task_unsubmited_percentage}}%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        {{$course->task_unsubmited_percentage}}%
                                                    </div>
                                                </div>
                                            @endif

                                        </td>
                                        <td class="text-center" style="vertical-align: middle; text-decoration: underline">
                                            <a href="#collapse-{{$i}}" data-toggle="collapse" class="text-primary">
                                                <span class="d-flex align-items-center">
                                                    Detail
                                                    <ion-icon name="chevron-down-circle-outline" style="font-size: 14px;" class="ml-2"></ion-icon>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="padding: 0px;">
                                            <div class="collapse" id="collapse-{{$i}}">
                                                <table class="table table-striped table-sub" style="margin: 0px;">
                                                    @foreach($course->tasks as $i => $task)
                                                        <tr>

                                                            @if($i == 0)
                                                                <td style="{{$i == 0 ? 'border-top: 0px;' : ''}}" class="text-center text-info" rowspan="{{$course->tasks->count()}}">
                                                                    <ion-icon name="return-down-forward-outline" class="mr-2" style="font-size: 40px"></ion-icon>
                                                                </td>
                                                            @endif

                                                            <td style="{{$i == 0 ? 'border-top: 0px;' : ''}}" width="20%">
                                                                <h6 class="d-flex align-items-center">
                                                                    @if ($task->hasNotUploaded(auth()->user()->student->id))
                                                                        <ion-icon name="warning-outline" style="font-size: 18px;" class="mr-2 text-danger" data-toggle="tooltip" title="Belum dikerjakan"></ion-icon>
                                                                    @elseif ($task->hasUploaded(auth()->user()->student->id))
                                                                        <ion-icon name="navigate-circle-outline" style="font-size: 18px;" class="mr-2 text-success" data-toggle="tooltip" title="Telah dikerjakan"></ion-icon>
                                                                    @elseif ($task->hasAssessed(auth()->user()->student->id))
                                                                        <ion-icon name="checkmark-circle-outline" style="font-size: 18px;" class="mr-2 text-primary" data-toggle="tooltip" title="Telah dinilai"></ion-icon>
                                                                    @endif
                                                                    Judul Tugas
                                                                </h6>
                                                                <span class="d-flex align-items-center text-muted">
                                                                    <ion-icon name="folder-open-outline" class="mr-2" style="font-size: 14px"></ion-icon> {{$task->title}}
                                                                </span>
                                                            </td>
                                                            <td style="{{$i == 0 ? 'border-top: 0px;' : ''}}">
                                                                <h6>Batas pengumpulan</h6>
                                                                <span class="d-flex align-items-center text-muted">
                                                                    <ion-icon name="calendar-outline" class="mr-2" style="font-size: 14px"></ion-icon> {{$task->max_date_upload ? date('j / m / Y', strtotime($task->max_date_upload)) : '-'}}
                                                                </span>
                                                            </td>
                                                            <td style="{{$i == 0 ? 'border-top: 0px;' : ''}}">
                                                                <h6>Download</h6>
                                                                <span class="text-muted">
                                                                    <a href="{{url(Storage::url($task->file))}}" target="_blank" class="line-0 d-flex align-items-center" style="text-decoration: underline">
                                                                        <ion-icon name="document-attach-outline" size="small" class="mr-1"></ion-icon> Form Tugas
                                                                    </a>
                                                                </span>
                                                            </td>
                                                            <td style="{{$i == 0 ? 'border-top: 0px;' : ''}}" width="15%">
                                                                <h6>Nilai</h6>
                                                                <span class="text-muted">
                                                                    <span style="font-weight: bold; letter-spacing: 1.2px;">{{$task->hasAssessed(auth()->user()->student->id) ? $task->hasAssessed(auth()->user()->student->id)->score : '-'}}  </span>
                                                                    @if($task->hasAssessed(auth()->user()->student->id))
                                                                        ({{$task->hasAssessed(auth()->user()->student->id)->scoreTitle}})
                                                                    @endif
                                                                </span>
                                                            </td>
                                                            <td style="{{$i == 0 ? 'border-top: 0px;' : ''}}">

                                                                @if ($task->hasNotUploaded(auth()->user()->student->id))
                                                                    <a href="" class="btn btn-outline-primary" onclick="upload(event, {{$task->id}}, '{{$task->course->name}}', '{{$task->title}}')">
                                                                        <span class="d-flex align-items-center">
                                                                            <ion-icon name="navigate-circle-outline" class="mr-2"></ion-icon>
                                                                            Upload Tugas
                                                                        </span>
                                                                    </a>
                                                                @elseif ($task->hasUploaded(auth()->user()->student->id))
                                                                    <h6>Download</h6>
                                                                    <span class="text-muted">
                                                                    <a href="{{url(Storage::url($task->hasUploaded(auth()->user()->student->id)->file))}}" target="_blank" class="line-0 d-flex align-items-center" style="text-decoration: underline">
                                                                        <ion-icon name="open-outline" size="small" class="mr-1"></ion-icon> Lihat Pengerjaan
                                                                    </a>
                                                                @elseif ($task->hasAssessed(auth()->user()->student->id))
                                                                    <h6>Hasil</h6>
                                                                    <span class="text-muted">
                                                                    <a href="{{url(Storage::url($task->hasAssessed(auth()->user()->student->id)->task_upload->file))}}" target="_blank" class="line-0 d-flex align-items-center" style="text-decoration: underline">
                                                                        <ion-icon name="open-outline" size="small" class="mr-1"></ion-icon> Lihat Pengerjaan
                                                                    </a>
                                                                </span>
                                                                @endif


                                                            </td>
                                                        </tr>

                                                    @endforeach

                                                    @if($course->tasks->count() == 0)
                                                        <tr>
                                                            <td colspan="6" class="text-center">
                                                                Tidak ada tugas pada
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
                                                </table>
                                            </div>
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

    <div class="modal fade" id="calendar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @csrf
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kalender</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 100vh;">

                    {!! $calendar->calendar() !!}

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

@section('css')
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
@endsection

@section('js')
    {!! $calendar->script() !!}}

    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>

    <script>
        function openCalendar(e) {
            e.preventDefault();
            $('.card-calendar').toggleClass('hide');
        }
        function upload (e, id, course, title) {
            e.preventDefault();
            $('#exampleModal').modal('show');
            $('#task-id').val(id);
            $('#tugas').val(title + ' - ' + course);
        }
    </script>
@endsection
