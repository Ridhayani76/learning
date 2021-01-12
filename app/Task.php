<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $guarded = [];

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
}
