<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Agency extends Model
{
    use Uuids;
    //
    protected $guarded = [];
}
