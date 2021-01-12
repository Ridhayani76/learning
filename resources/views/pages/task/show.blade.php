@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            {{$task->title}}
                        </div>
                    </div>

                    <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">Nomor</th>
                                <th width="15%" class="text-center">NIM</th>
                                <th>Nama</th>
                                <th class="text-center">Dokumen</th>
                                <th class="text-center">Mengumpulkan Pada</th>
                                <th class="text-center">Nilai</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $i => $student)
                                <tr>
                                    <td class="text-center">{{$i + 1}}</td>
                                    <td class="text-center">{{$student->nim ? $student->nim : '-'}}</td>
                                    <td>{{$student->name}}</td>
                                    <td class="text-center">
                                        @if($task->hasUploaded($student->id))
                                            <a href="{{url(Storage::url($task->hasUploaded($student->id)->file))}}" download="" class="btn btn-link text-success bg-light btn-sm">Download</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($task->hasUploaded($student->id))
                                            {{$task->hasUploaded($student->id)->created_at->diffForHumans()}}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center d-flex">
                                        <form action="{{route('teacher.assessment.store')}}" method="POST" style="width: 100%;">
                                            @csrf

                                            @if($task->hasUploaded($student->id))
                                                <input type="hidden" name="task_upload_id" value="{{$task->hasUploaded($student->id)->id}}">
                                            @endif

                                            <div class="input-group input-group-sm">
                                                <input type="number" name="score" class="form-control text-center" value="{{$task->hasUploaded($student->id) ? $task->hasUploaded($student->id)->assessment ? $task->hasUploaded($student->id)->assessment->score : 0 : 0}}" {{!$task->hasUploaded($student->id) ? 'disabled' : ''}} style="width: 0px;">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-outline-success" type="button">Update</button>
                                                </div>
                                            </div>
                                        </form>
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
