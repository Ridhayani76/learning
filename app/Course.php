<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $guarded = [];

    public function teacher () {
        return $this->belongsTo(Teacher::class);
    }

    public function tasks () {
        return $this->hasMany(Task::class);
    }
}
