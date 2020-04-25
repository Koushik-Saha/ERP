<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $primaryKey = 'project_id';

    protected $fillable = ['project_name', 'project_location', 'project_price', 'project_status', 'project_client_id', 'project_date', 'project_total_member', 'project_description','project_image'];

    public function client()
    {
        return $this->belongsTo(User::class, 'project_client_id', 'id');
    }


}
