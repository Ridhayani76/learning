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

                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Buat Baru</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

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
                                <thead>
                                <tr>
                                    <th>Tempat Praktik</th>
                                    <th>Kompetensi</th>
                                    <th>Jumlah Anggota</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp

                                @foreach($practices as $practice)
                                    <tr>
                                        <td style="vertical-align: middle">{{$practice->agency->name}}</td>
                                        <td style="vertical-align: middle">{{$practice->skill->name}}</td>
                                        <td style="vertical-align: middle">{{$practice->members->count()}}</td>
                                        <td style="vertical-align: middle" class="text-center">
                                            <a href="{{route('teacher.practice.show', ['practice' => $practice->id])}}" class="btn btn-outline-success btn-sm mr-2">Lihat</a>
                                            <a href="" class="btn btn-outline-danger btn-sm mr-2">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach

                                @if($practices->count() == 0)
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada kompetensi</td>
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
                            <button class="btn btn-primary" type="submit">Buat Wahana Praktik</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
