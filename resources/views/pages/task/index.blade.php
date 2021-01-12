@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            {{ __('Jadwal') }}
                        </div>
                        <div>
                            <a href="{{route('teacher.schedule.create')}}" class="btn btn-primary">
                                Buat Jadwal
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Kelas</th>
                                    <th>Matkul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td>{{$item->created_at->format('D j F Y')}}</td>
                                    <td>{{$item->classroom->name}}</td>
                                    <td>{{$item->course->name}}</td>
                                    <td>
                                        <a href="">Lihat</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
