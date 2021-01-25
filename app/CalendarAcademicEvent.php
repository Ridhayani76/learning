<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class CalendarAcademicEvent extends Model
{
    use Uuids;

    //
    protected $guarded = [];
    protected $appends = ['dateDisplay'];

    public function calendar_academic () {
        return $this->belongsTo(CalendarAcademic::class);
    }
    public function getDateDisplayAttribute () {
        if ($this->start == $this->end) {
            return date('j M', strtotime($this->start));
        } else {
            if (date('m', strtotime($this->start)) == date('m', strtotime($this->end))) {
                return date('j', strtotime($this->start)) . ' - ' . date('j', strtotime($this->end)) . ' ' . date('M', strtotime($this->start));
            } else {
                return date('j M', strtotime($this->start)) . ' - ' . date('j M', strtotime($this->end));
            }
        }
    }
}
