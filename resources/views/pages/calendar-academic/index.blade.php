@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/calendar-academic-2.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h4 style="font-weight: bold;" class="text-primary d-flex align-items-center">
                        <ion-icon name="calendar" class="mr-2"></ion-icon>
                        Tahun 2021
                    </h4>
                    <h1>Kalender Akademik</h1>
                    <p class="text-muted">Klik tombol dibawah untuk membuat data kelas baru</p>

                    @if(auth()->user()->role == 'admin')
                        <a href="" class="btn btn-primary mr-3" data-toggle="modal" data-target="#exampleModal">
                            <span class="d-flex align-items-center">
                                <ion-icon name="add-outline" class="mr-2"></ion-icon> Tambah Kegiatan
                            </span>
                        </a>
                    @else()
                        <a href="#" onclick="openCalendar(event)" class="btn btn-primary mr-3">
                        <span class="d-flex align-items-center">
                            <ion-icon name="calendar-outline" class="mr-2"></ion-icon> Buka Kalender
                        </span>
                        </a>
                    @endif
                    <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                        <span class="d-flex align-items-center">
                            <ion-icon name="document-text-outline" class="mr-2"></ion-icon> Download PDF
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
                    <a href="{{route(auth()->user()->role . '.dashboard')}}" class="d-flex align-items-center">
                        <ion-icon name="home-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                        Home
                    </a>
                </li>
                <li class="breadcrumb-item active d-flex align-items-center" aria-current="page">
                    <ion-icon name="calendar-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                    Kalender Akademic {{$year}}
                </li>
            </ol>
        </nav>

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

        @include('layouts.message')

        <div class="row justify-content-center">

            @foreach($calendars as $c)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="card-title mb-1">Semester {{$c->semester}}</h5>
                            <span class="text-muted" style="font-size: 14px; letter-spacing: 1.1px;">{{$c->period}}</span>
                        </div>
                    </div>

                    <div class="card-body" style="padding-top: 0px;">

                        <ul class="timeline">
                            @foreach($c->events()->orderBy('start', 'asc')->get() as $event)
                            <li>
                                <span class="text-primary" style="font-weight: 500; letter-spacing: 1.1px;">{{$event->dateDisplay}}</span>

                                @if(auth()->user()->role == 'admin')
                                <a href="#" class="float-right" data-toggle="tooltip" title="Hapus jadwal">
                                    <ion-icon name="trash-outline" class="text-danger" style="font-size: 18px;"></ion-icon>
                                </a>
                                @endif
                                <p class="mt-1 text-muted">
                                    {{$event->event}}
                                </p>
                            </li>
                            @endforeach
                        </ul>


                        @if($c->events->count() > 0)
                            <div class="text-left text-muted mb-3 mt-4" style="font-size: 12px;">Ada {{$c->events->count()}} kegiatan.</div>
                        @else
                            <div class="text-left text-muted mb-3" style="font-size: 12px; margin-top: -16px;">Tidak ada kegiatan.</div>
                        @endif

                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <!-- Modal -->
    <form action="{{route('admin.calendar-academic-event.store')}}" method="POST" enctype="multipart/form-data" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">

                        <input type="hidden" name="year" value="{{$year}}">

                        <div class="form-group mb-3 col-12">
                            <label for="semester" class="text-muted">Semester</label>
                            <select name="semester" id="semester" class="form-control">
                                <option value="Gasal">Gasal</option>
                                <option value="Genap">Genap</option>
                                <option value="Khusus">Khusus</option>
                            </select>
                        </div>

                        <div class="form-group mb-3 col-6">
                            <label for="start" class="text-muted">Tanggal Mulai</label>
                            <input type="date" id="start" class="form-control" name="start" value="{{old('start')}}">
                        </div>

                        <div class="form-group mb-3 col-6">
                            <label for="end" class="text-muted">Tanggal Selesai</label>
                            <input type="date" id="end" class="form-control" name="end" value="{{old('end')}}">
                        </div>

                        <div class="form-group mb-3 col-12">
                            <label for="event" class="text-muted">Kegiatan</label>
                            <textarea name="event" id="" class="form-control" cols="30" rows="6" placeholder="Tuliskan kegiatan">{{old('event')}}</textarea>
                        </div>

                    </div>


                    <div class="row mt-4">
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                <span class="d-flex align-items-center">
                                    <ion-icon name="save-outline" class="mr-2"></ion-icon> Simpan
                                </span>
                            </button>
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
