<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $primaryKey = 'activity_id';

    const UPDATED_AT = false;
}
