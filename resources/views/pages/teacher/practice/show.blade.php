@extends('layouts.app')

@section('content')

    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/practice.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h6 class="text-muted">{{$practice->skill->name}}</h6>
                    <h1>{{$practice->agency->name}}</h1>
                    <h5 class="mb-5">Periode ({{date('j M Y', strtotime($practice->start))}} - {{date('j M Y', strtotime($practice->end))}})</h5>

                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <span class="d-flex align-items-center">
                            <ion-icon name="add-outline" class="mr-1"></ion-icon> Tambah anggota
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
                <li class="breadcrumb-item"><a href="{{route('teacher.practice.index')}}">Wahana Praktik</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$practice->agency->name}} periode {{date('j F Y', strtotime($practice->start))}} sampai {{date('j F Y', strtotime($practice->end))}}</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Daftar Anggota
                </h5>
            </div>
            <div class="card-body" style="padding: 0px;">
                <table class="table table-striped" style="margin: 0px;">
                    <tbody>
                        @foreach($practice->members as $i => $member)
                            <tr>
                                <td class="text-center" style="width: 60px;">
                                    <img src="{{Avatar::create($i+1)->setDimension(50)->setFontSize(18)->toBase64()}}" />
                                </td>
                                <td>
                                    <h6>{{$member->student->name}}</h6>
                                    <span>Kelas {{$member->student->classroom->name}}</span>
                                </td>
                                <td class="text-center">
                                    <a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                                        <span class="d-flex align-items-center">
                                            <ion-icon name="trash-outline" class="mr-1"></ion-icon> Batalkan
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        @if($practice->members->count() == 0)
                            <tr>
                                <td colspan="3" class="text-center">Belum ada anggota</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <form action="{{route('teacher.practice-member.store')}}" method="POST" enctype="multipart/form-data" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="practice_id" value="{{$practice->id}}">

                    <div class="form-group row align-items-center">
                        <div class="col-3 text-right">Siswa</div>
                        <div class="col-9">
                            <select name="student_id" id="student_id" class="form-control">
                                @foreach(\App\Student::all() as $student)
                                <option value="{{$student->id}}">{{$student->classroom->name}}/{{$student->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col-3 text-right">Semester</div>
                        <div class="col-9">
                            <select name="semester" id="semester" class="form-control">
                                @foreach(range(1, 8) as $i)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3"></div>
                        <div class="col-9">
                            <button class="btn btn-success" type="submit">Tambah Anggota</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
