<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $guarded = [];
    protected $appends = ['firstName'];

    public function courses () {
        return $this->hasMany(Course::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function getFirstNameAttribute () {
        return explode(' ', $this->name)[0];
    }
}
