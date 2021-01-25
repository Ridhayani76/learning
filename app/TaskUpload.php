<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class TaskUpload extends Model
{
    use Uuids;
    //
    protected $guarded = [];

    public function task () {
        return $this->belongsTo(Task::class);
    }

    public function assessment () {
        return $this->hasOne(Assessment::class);
    }
}
