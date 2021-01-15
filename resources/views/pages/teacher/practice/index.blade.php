@extends('layouts.app')

@section('content')

    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/practice-2.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h1>Wahana Praktik</h1>
                    <p class="text-muted">Klik tombol dibawah untuk membuat wahana praktik</p>

                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <span class="d-flex align-items-center">
                            <ion-icon name="create-outline" class="mr-1"></ion-icon> Buat Baru
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
                <li class="breadcrumb-item active" aria-current="page">Wahana Praktik</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title">
                            List Wahana Praktik
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

                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-striped" style="margin-bottom: 0px;">
                                <tbody>

                                @foreach($practices as $practice)
                                    <tr>
                                        <td style="vertical-align: middle">
                                            <h6>Tempat Praktik</h6>
                                            {{$practice->agency->name}}
                                        </td>
                                        <td style="vertical-align: middle">
                                            <h6>Kompetensi</h6>
                                            {{$practice->skill->name}}
                                        </td>
                                        <td style="vertical-align: middle">
                                            <h6>Jumlah Anggota</h6>
                                            {{$practice->members->count()}}
                                        </td>
                                        <td style="vertical-align: middle" class="text-center">
                                            <a href="" class="btn btn-outline-danger btn-sm mr-2 line-0" style="padding: 10px">
                                                <ion-icon name="trash-outline" size="small"></ion-icon>
                                            </a>
                                            <a href="{{route('teacher.practice.show', ['practice' => $practice->id])}}" class="btn btn-primary btn-sm">
                                                <span class="d-flex align-items-center">
                                                    Detail
                                                    <ion-icon name="arrow-forward-outline" class="ml-1"></ion-icon>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                @if($practices->count() == 0)
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada wahana praktik</td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form action="{{route('teacher.practice.store')}}" method="POST" enctype="multipart/form-data" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Wahana Praktik Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row align-items-center">
                        <div class="col-12">Kompetensi</div>
                        <div class="col-12">
                            <select name="skill_id" class="form-control">
                                @foreach(\App\Skill::orderBy('name', 'asc')->get() as $skill)
                                    <option value="{{$skill->id}}">{{$skill->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <div class="col-12">Tempat Praktik</div>
                        <div class="col-12">
                            <select name="agency_id" class="form-control">
                                @foreach(\App\Agency::orderBy('name', 'asc')->get() as $agency)
                                    <option value="{{$agency->id}}">{{$agency->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <div class="col-12">Tanggal Mulai</div>
                        <div class="col-12">
                            <input type="date" name="start" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <div class="col-12">Tanggal Selesai</div>
                        <div class="col-12">
                            <input type="date" name="end" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                <span class="d-flex align-items-center">
                                    <ion-icon name="create-outline" class="mr-1"></ion-icon> Buat Wahana Praktik
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
