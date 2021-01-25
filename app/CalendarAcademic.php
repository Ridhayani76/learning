<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarAcademic extends Model
{
    //
    protected $guarded = [];
    protected $appends = ['period'];

    public function events () {
        return $this->hasMany(CalendarAcademicEvent::class);
    }

    public function getPeriodAttribute () {
        $start = $this->events()->orderBy('start', 'asc')->first();
        $end = $this->events()->orderBy('end', 'desc')->first();

        if ($start && $end) {
            $start = $start->start;
            $end = $end->end;

            if (date('Y', strtotime($start)) == date('Y', strtotime($end))) {
                if (date('m-Y', strtotime($start)) == date('m-Y', strtotime($end))) {
                    return date('j', strtotime($start)) . ' - ' . date('j', strtotime($end)). ' ' . date('M', strtotime($start)). ' ' . date('Y', strtotime($start));
                }
                return date('j M', strtotime($start)) . ' - ' . date('j M', strtotime($end)). ' ' . date('Y', strtotime($start));
            }

            return date('j M Y', strtotime($start)) . ' - ' . date('j M Y', strtotime($end));
        }

        return "";
    }
}
