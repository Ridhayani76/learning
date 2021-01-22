@extends('layouts.app')

@section('content')

    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/practice.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h5 class="text-muted d-flex align-items-center">
                        <ion-icon name="navigate-circle-outline" style="font-size: 22px;" class="mr-2"></ion-icon>
                        {{$practice->agency->name}}
                    </h5>
                    <h1 class="mb-3">Praktik {{$practice->skill->name}}</h1>
                    <h6 class="mb-5 d-flex align-items-center">
                        <ion-icon name="calendar-outline" style="font-size: 18px;" class="mr-2"></ion-icon>
                        Periode ({{date('j M Y', strtotime($practice->start))}} - {{date('j M Y', strtotime($practice->end))}})
                    </h6>

                    <a href="" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModal">
                        <span class="d-flex align-items-center">
                            <ion-icon name="person-add-outline" class="mr-2"></ion-icon> Tambah anggota
                        </span>
                    </a>
                    <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                        <span class="d-flex align-items-center">
                            <ion-icon name="create-outline" class="mr-1"></ion-icon> Edit
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
                    <a href="{{route('teacher.practice.index')}}" class="text-primary d-flex align-items-center">
                        <ion-icon name="git-network-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                        Wahana Praktik
                    </a>
                </li>
                <li class="breadcrumb-item active d-flex align-items-center" aria-current="page">
                    <ion-icon name="navigate-circle-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                    {{$practice->agency->name}} periode {{$practice->periode}}
                </li>

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
                                    <img src="https://randomuser.me/api/portraits/men/{{$i+1}}.jpg" width="50px" height="50px" style="border-radius: 50%;">
                                </td>
                                <td>
                                    <h6>{{$member->student->name}}</h6>
                                    <span class="d-flex align-items-center text-muted">
                                        <ion-icon name="people-outline" class="mr-1" style="font-size: 14px"></ion-icon> Kelas {{$member->student->classroom->name}}
                                    </span>
                                </td>
                                <td>
                                    <h6>Status</h6>
                                    <span class="text-muted d-flex align-items-center">
                                        <ion-icon name="hourglass-outline" class="mr-1" style="font-size: 14px;"></ion-icon>
                                        Semester {{$member->semester}}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                                        <span class="d-flex align-items-center">
                                            <ion-icon name="person-remove-outline" class="mr-2"></ion-icon> Batalkan
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
                            <select name="semester" id="semester" class="form-control" style="width: 80px">
                                @foreach(range(1, 8) as $i)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3"></div>
                        <div class="col-9">
                            <button class="btn btn-primary" type="submit">
                                <span class="d-flex align-items-center">
                                    <ion-icon name="add-outline" class="mr-1"></ion-icon>
                                    Tambah Anggota
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
