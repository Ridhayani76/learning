@extends('layouts.app')

@section('content')
    <div class="jumbotron" style="margin-top: 30px;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('img/practice.svg')}}" alt="" class="hero-image">
                </div>
                <div class="col-md-8">
                    <h6 class="text-muted">Dashboard</h6>
                    <h2>{{env('APP_NAME')}} App</h2>
                    <p>
                        Selamat datang kembali <span class="text-primary font-weight-bold">{{ Auth::user()->student->name }}</span> :)
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Wahana Praktik
                        </h5>
                    </div>

                    <div class="card-body" style="padding: 0px;">
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
                                        <h6>Periode</h6>
                                        {{$practice->periode}}
                                    </td>
                                    <td style="vertical-align: middle" class="text-center">
                                        <a href="{{route('teacher.practice.show', ['practice' => $practice->id])}}" class="btn btn-outline-primary btn-sm">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
