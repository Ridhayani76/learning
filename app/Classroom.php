<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use Uuids;

    protected $guarded = [];
    //
    public function students () {
        return $this->hasMany(Student::class);
    }

    public function tasks () {
        return $this->hasMany(Task::class);
    }
}
