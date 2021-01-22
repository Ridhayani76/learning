<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $guarded = [];
    protected $appends = ['score'];

    public function task_uploads () {
        return $this->hasMany(TaskUpload::class);
    }

    public function classroom () {
        return $this->belongsTo(Classroom::class);
    }

    public function hasUploaded ($student_id) {
        return $this->task_uploads()->where('student_id', $student_id)->first();
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
