<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    //
    protected $guarded = [];

    public function skill () {
        return $this->belongsTo(Skill::class);
    }

    public function agency () {
        return $this->belongsTo(Agency::class);
    }

    public function members () {
        return $this->hasMany(PracticeMember::class);
    }
}
