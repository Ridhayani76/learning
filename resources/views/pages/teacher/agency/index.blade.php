@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/agency.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h1>Tempat Praktik</h1>
                    <p class="text-muted">Klik tombol dibawah untuk membuat tempat praktik baru</p>

                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Buat Baru</a>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            Daftar Tempat Praktik
                        </div>
                    </div>

                    <div class="card-body">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif

                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Tempat Praktik</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp

                                @foreach($agencies as $agency)
                                    <tr>
                                        <td style="vertical-align: middle">{{$i}}</td>
                                        <td style="vertical-align: middle">{{$agency->name}}</td>
                                        <td style="vertical-align: middle" class="text-center">
                                            <a href="" class="btn btn-outline-danger btn-sm mr-2">Hapus</a>
                                        </td>
                                    </tr>

                                @endforeach

                                @if($agencies->count() == 0)
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada tempat praktik</td>
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
    <form action="{{route('teacher.agency.store')}}" method="POST" enctype="multipart/form-data" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tempat Praktik Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row align-items-center">
                        <div class="col-3 text-right">Tempat</div>
                        <div class="col-9">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col-3 text-right">Telp</div>
                        <div class="col-9">
                            <input type="text" class="form-control" name="phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3 text-right">Alamat</div>
                        <div class="col-9">
                            <textarea name="address" cols="30" rows="8" class="form-control"></textarea>
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
