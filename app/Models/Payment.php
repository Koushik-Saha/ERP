<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $primaryKey = 'payment_id';

    public function project() {
        return $this->belongsTo(Projects::class, 'payment_for_project', 'project_id');
    }

    public function fromUser() {
        return $this->belongsTo(User::class, 'payment_from_user', 'id');
    }

    public function toUser() {
        return $this->belongsTo(User::class, 'payment_to_user', 'id');
    }

    public function activity() {
        return $this->hasOne(Activity::class, 'activity_payment_id', 'payment_id');
    }
}
