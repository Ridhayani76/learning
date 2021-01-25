<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use Uuids;

    //
    protected $guarded = [];

    public function teacher () {
        return $this->belongsTo(Teacher::class);
    }

    public function tasks () {
        return $this->hasMany(Task::class);
    }
}
