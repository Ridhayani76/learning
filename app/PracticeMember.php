<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class PracticeMember extends Model
{
    use Uuids;

    //
    protected $guarded = [];

    public function student () {
        return $this->belongsTo(Student::class);
    }

    public function practice () {
        return $this->belongsTo(Practice::class);
    }
}
