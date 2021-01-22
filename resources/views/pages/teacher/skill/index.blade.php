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

        @include('layouts.message')

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

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form action="{{route(auth()->user()->role . '.skill.store')}}" method="POST" enctype="multipart/form-data" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <div class="col-3 text-right">Nama</div>
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
