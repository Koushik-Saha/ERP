<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ProjectLogs extends Model
{
    protected $table = 'project_logs';

    protected $primaryKey = 'pl_id';

//    public function project() {
//        return $this->belongsTo(ProjectLogs::class, 'pl_project_id', 'project_id');
//    }
//
//    public function user() {
//        return $this->belongsTo(User::class, 'pl_user_id', 'id');
//    }

    public function projectLogsUser()
    {
        return $this->belongsTo(User::class, 'pl_user_id', 'id');
    }
}
