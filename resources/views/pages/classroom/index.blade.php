@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/classroom.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h1>Kelas</h1>
                    <p class="text-muted">Klik tombol dibawah untuk membuat data kelas baru</p>

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
                <li class="breadcrumb-item">
                    <a href="{{route('teacher.dashboard')}}" class="d-flex align-items-center">
                        <ion-icon name="home-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                        Home
                    </a>
                </li>
                <li class="breadcrumb-item active d-flex align-items-center" aria-current="page">
                    <ion-icon name="layers-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                    Kelas
                </li>
            </ol>
        </nav>

        @include('layouts.message')

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="card-title mb-1">Daftar Kelas</h5>
                            <span class="text-muted" style="font-size: 12px;">Ada {{$classrooms->count()}} kelas terdaftar.</span>
                        </div>
                    </div>

                    <div class="card-body" style="padding: 0px;">

                        <table class="table table-striped" style="margin-bottom: 0px;">

                            @foreach($classrooms as $classroom)
                                <tr>
                                    <td style="vertical-align: middle">
                                        <h6>Nama Kelas</h6>
                                        <span class="d-flex align-items-center">
                                            <ion-icon name="layers-outline" class="mr-2" style="font-size: 14px;"></ion-icon>
                                            {{$classroom->name}}
                                        </span>
                                    </td>
                                    <td style="vertical-align: middle">
                                        <h6>Jumlah murid</h6>
                                        <span class="d-flex text-muted align-items-center" style="letter-spacing: 1.2px; font-weight: 500;">
                                            <ion-icon name="people-outline" class="mr-2" style="font-size: 14px;"></ion-icon>
                                            {{$classroom->students->count()}}
                                        </span>
                                    </td>
                                    <td style="vertical-align: middle" class="text-center">
                                        <a href="" class="btn btn-outline-danger mr-2" data-toggle="tooltip" title="Hapus" style="padding: 10px;">
                                            <span class="d-flex align-items-center">
                                                <ion-icon name="trash-outline" style="font-size: 20px;"></ion-icon>
                                            </span>
                                        </a>
                                        <a href="" class="btn btn-outline-primary mr-2" data-toggle="tooltip" title="Edit" style="padding: 10px;">
                                            <span class="d-flex align-items-center">
                                                <ion-icon name="create-outline" style="font-size: 20px;"></ion-icon>
                                            </span>
                                        </a>
                                        <a href="{{route('admin.student.index', ['classroom' => $classroom->id])}}" class="btn btn-outline-primary">
                                            <span class="d-flex align-items-center">
                                                Lihat Siswa
                                                <ion-icon name="arrow-forward-outline" class="ml-2" style="font-size: 18px;"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach

                            @if($classrooms->count() == 0)
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada kelas</td>
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
    <form action="{{route('admin.classroom.store')}}" method="POST" enctype="multipart/form-data" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row align-items-center">
                        <div class="col-3 text-right">Nama Kelas</div>
                        <div class="col-9">
                            <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-9 offset-3">
                            <button class="btn btn-primary" type="submit">
                                <span class="d-flex align-items-center">
                                    <ion-icon name="save-outline" class="mr-2" style="font-size: 18px;"></ion-icon>
                                    Simpan
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
