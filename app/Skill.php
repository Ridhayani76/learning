<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use Uuids;

    //
    protected $guarded = [];
}
