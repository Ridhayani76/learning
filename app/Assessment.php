<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use Uuids;

    //
    protected $guarded = [];
    protected $appends = ['scoreTitle'];

    public function task_upload () {
        return $this->belongsTo(TaskUpload::class);
    }

    public function getScoreTitleAttribute () {
        if ($this->score == 100)
            return "Sempurna";
        elseif ($this->score >= 95)
            return "Istimewa";
        elseif ($this->score >= 85)
            return "Spesial";
        elseif ($this->score >= 80)
            return "Sangat Baik";
        elseif ($this->score >=75)
            return "Baik";
        elseif ($this->score >= 50)
            return "Kurang";
        else
            return "Buruk";

    }
}
