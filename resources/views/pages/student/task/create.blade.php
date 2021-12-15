@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        {{ __('Buat Jadwal') }}
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{route('teacher.schedule.task.store', ['schedule' => $schedule->id])}}" method="POST">

                        @csrf

                        <div class="form-group row d-flex align-items-center justify-content-center">
                            <div class="col-2 text-right">
                                Mata Pelajaran
                            </div>
                            <div class="col-10">
                                <select name="course_id" class="form-control">
                                    @foreach(auth()->user()->teacher->courses as $course)
                                    <option value="{{$course->id}}">
                                        {{$course->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center justify-content-center">
                            <div class="col-2 text-right">
                                Kelas
                            </div>
                            <div class="col-10">
                                <select name="classroom_id" class="form-control">
                                    @foreach(\App\Classroom::all() as $classroom)
                                    <option value="{{$classroom->id}}">
                                        {{$classroom->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">Buat Jadwal</button>
                                <button type="submit" class="btn btn-link ml-2" onclick="window.location = '{{route('teacher.schedule.index')}}'">Batalkan</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection