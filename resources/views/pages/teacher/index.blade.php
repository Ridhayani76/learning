@extends('layouts.app')

@section('content')
<div class="jumbotron" style="margin-top: 30px;">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-4">
                <img src="{{asset('img/undraw_teacher_-35-j2.svg')}}" alt="" class="hero-image">
            </div>
            <div class="col-md-8">
                <h1>Guru</h1>
                <p class="text-muted">Klik tombol dibawah untuk membuat data guru baru</p>

                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <span class="d-flex align-items-center">
                        <ion-icon name="person-add-outline" class="mr-2"></ion-icon> Tambah guru
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
                <ion-icon name="person-outline" style="font-size: 14px;" class="mr-1"></ion-icon>
                Guru
            </li>
        </ol>
    </nav>

    @include('layouts.message')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title mb-1">Daftar Guru</h5>
                        <span class="text-muted" style="font-size: 12px;">Ada {{$teachers->count()}} guru terdaftar.</span>
                    </div>
                </div>

                <div class="card-body" style="padding: 0px;">

                    <table class="table table-striped" style="margin-bottom: 0px;">

                        @foreach($teachers as $teacher)
                        <tr>
                            <td style="vertical-align: middle">
                                <h6>Nama</h6>
                                <span class="d-flex align-items-center">
                                    <ion-icon name="person-outline" class="mr-2" style="font-size: 14px;"></ion-icon>
                                    {{$teacher->name}}
                                </span>
                            </td>
                            <td style="vertical-align: middle">
                                <h6>NIP</h6>
                                <span class="d-flex align-items-center text-muted" style="letter-spacing: 1.2px; font-weight: 500;">
                                    <ion-icon name="card-outline" class="mr-2" style="font-size: 14px;"></ion-icon>
                                    {{$teacher->nip}}
                                </span>
                            </td>
                            <td style="vertical-align: middle">
                                <h6>Mata pelajaran</h6>
                                <span class="d-flex align-items-center text-muted" style="font-weight: 500;">
                                    <ion-icon name="book-outline" class="mr-2" style="font-size: 14px;"></ion-icon>
                                    {{$teacher->courses->count()}}
                                </span>
                            </td>
                            <td style="vertical-align: middle" class="text-center">
                                <a href="" class="btn btn-outline-danger mr-2" data-toggle="tooltip" title="Hapus" style="padding: 10px;">
                                    <span class="d-flex align-items-center">
                                        <ion-icon name="trash-outline" style="font-size: 20px;"></ion-icon>
                                    </span>
                                </a>
                                <a href="#" data-url="{{route('admin.teacher.reset-password', ['teacher' => $teacher->id])}}" class="btn btn-outline-primary mr-2 ajax" data-toggle="tooltip" title="Reset Password" data-text="Jika kamu mengkonfirmasi, password akan direset sesuai dengan nama depan ({{strtolower($teacher->firstName)}})." style="padding: 10px;">
                                    <span class="d-flex align-items-center">
                                        <ion-icon name="key-outline" style="font-size: 20px;"></ion-icon>
                                    </span>
                                </a>
                                <a href="" class="btn btn-outline-primary">
                                    <span class="d-flex align-items-center">
                                        <ion-icon name="create-outline" class="mr-2" style="font-size: 18px;"></ion-icon>
                                        Edit
                                    </span>
                                </a>

                                <form id="form-reset-{{$teacher->id}}" method="POST" action="{{route('admin.teacher.reset-password', ['teacher' => $teacher->id])}}">
                                    @csrf
                                </form>
                            </td>
                        </tr>

                        @endforeach

                        @if($teachers->count() == 0)
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada guru</td>
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
<form action="{{route('admin.teacher.store')}}" method="POST" enctype="multipart/form-data" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @csrf
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group mb-3 col-12">
                        <label for="name" class="text-muted">Nama</label>
                        <input type="text" id="name" class="form-control autofocus" name="name" value="{{old('name')}}">
                    </div>

                    <div class="form-group col-12">
                        <label for="nip" class="text-muted" data-toggle="tooltip" title="NIP Digunakan sebagai Username" data-placement="right">NIP (Username)</label>
                        <input type="text" id="nip" class="form-control" name="nip" value="{{old('nip')}}">
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