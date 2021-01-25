<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded =  [];
    protected $appends = ['firstName'];

    //
    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }

    public function getFirstNameAttribute () {
        return explode(' ', $this->name)[0];
    }
}
