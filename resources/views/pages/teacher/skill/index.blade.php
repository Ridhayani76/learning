@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/skill.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h1>Kompetensi</h1>
                    <p class="text-muted">Klik tombol dibawah untuk membuat kompetensi baru</p>

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
                    <ion-icon name="flask-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                    Kompetensi
                </li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="card-title mb-1">Daftar Kompetensi</h5>
                            <span class="text-muted" style="font-size: 12px;">Ada {{$skills->count()}} kompetensi terdaftar.</span>
                        </div>
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

                                @foreach($skills as $skill)
                                    <tr>
                                        <td style="vertical-align: middle">
                                            <h6>Kompetensi</h6>
                                            <span class="d-flex align-items-center">
                                                <ion-icon name="flask-outline" class="mr-2" style="font-size: 14px;"></ion-icon>
                                                {{$skill->name}}
                                            </span>
                                        </td>
                                        <td style="vertical-align: middle" class="text-center">
                                            <a href="" class="btn btn-outline-danger mr-2" data-toggle="tooltip" title="Hapus" style="padding: 10px;">
                                                <span class="d-flex align-items-center">
                                                    <ion-icon name="trash-outline" style="font-size: 20px;"></ion-icon>
                                                </span>
                                            </a>
                                            <a href="" class="btn btn-outline-primary">
                                                <span class="d-flex align-items-center">
                                                    <ion-icon name="create-outline" class="mr-2" style="font-size: 18px;"></ion-icon>
                                                    Edit
                                                </span>
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach

                                @if($skills->count() == 0)
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
    <form action="{{route('teacher.skill.store')}}" method="POST" enctype="multipart/form-data" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kompetensi Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row align-items-center">
                        <div class="col-12">Nama Kompetensi</div>
                        <div class="col-12">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
