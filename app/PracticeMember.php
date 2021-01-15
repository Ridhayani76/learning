<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PracticeMember extends Model
{
    //
    protected $guarded = [];

    public function student () {
        return $this->belongsTo(Student::class);
    }

    public function practice () {
        return $this->belongsTo(Practice::class);
    }
}
