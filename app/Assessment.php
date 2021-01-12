<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    //
    protected $guarded = [];

    public function task_upload () {
        return $this->belongsTo(TaskUpload::class);
    }
}
