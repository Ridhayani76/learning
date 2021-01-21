<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    protected $appends = ['periode'];
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

    public function getPeriodeAttribute () {

        if (date('Y', strtotime($this->start)) == date('Y', strtotime($this->end))) {

            if (date('m', strtotime($this->start)) == date('m', strtotime($this->end))) {
               return date('j', strtotime($this->start)) . " - " . date('j', strtotime($this->end)) . " " . date('M', strtotime($this->start)) . " " . date('Y', strtotime($this->start));
            }

            return date('j M', strtotime($this->start)) . " - " . date('j M', strtotime($this->end)) . " " . date('Y', strtotime($this->start));
        }

        return date('j M Y', strtotime($this->start)) . " - " . date('j M Y', strtotime($this->end));
     }

}
