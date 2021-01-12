@extends('layouts.app')

@section('content')

    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/practice.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h6 class="text-muted mb-3">Wahana Praktik</h6>
                    <h1>{{$practice->agency->name}}</h1>
                    <h5 class="mb-5">{{$practice->skill->name}}</h5>

                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Tambah Anggota</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="card">
            <div class="card-body" style="padding: 0px;">
                <table class="table table-striped" style="margin: 0px;">
                    <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Anggota</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($practice->members as $member)
                            <tr>
                                <td>{{$member->student->classroom->name}}</td>
                                <td>{{$member->student->name}}</td>
                                <td>
                                    <a href="">Hapus</a>
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
                                <option value="{{$student->id}}">{{$student->classroom->name}} - {{$student->name}}</option>
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
