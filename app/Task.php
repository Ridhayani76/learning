<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use Uuids;

    //
    protected $guarded = [];
    protected $appends = ['score'];

    public function task_uploads () {
        return $this->hasMany(TaskUpload::class);
    }

    public function classroom () {
        return $this->belongsTo(Classroom::class);
    }

    public function hasNotUploaded ($student_id) {
        $task_upload = $this->task_uploads()->where('student_id', $student_id)->first();

        return !$task_upload;
    }

    public function hasUploaded ($student_id) {
        $task_upload = $this->task_uploads()->where('student_id', $student_id)->first();

        if (!isset($task_upload->assessment) && $task_upload)
            return $task_upload;

        return false;
    }

    public function hasAssessed ($student_id) {
        $task_upload = $this->task_uploads()->where('student_id', $student_id)->first();
        $assessment = isset($task_upload->assessment) ? $task_upload->assessment : false;

        return $assessment;
    }

    public function course () {
        return $this->belongsTo(Course::class);
    }

    public function getScoreAttribute ($student_id) {
        if ($this->hasUploaded($student_id) && isset($this->hasUploaded($student_id)->assessment)) {
            return $this->hasUploaded($student_id)->assessment->score;
        } else {
            return false;
        }
    }

    public function countUpload () {
        $self = $this;

        return $this->classroom->students->filter(function ($student) use ($self) {
            return $self->hasUploaded($student->id) && !isset($self->hasUploaded($student->id)->assessment);
        })->count();
    }

    public function countAssessed () {
        $self = $this;

        return $this->classroom->students->filter(function ($student) use ($self) {
            return $self->hasUploaded($student->id) && isset($self->hasUploaded($student->id)->assessment);
        })->count();
    }
//
    public function countNotupload () {
        $self = $this;

        return $this->classroom->students->filter(function ($student) use ($self) {
            return !$self->hasUploaded($student->id);
        })->count();
    }

}
