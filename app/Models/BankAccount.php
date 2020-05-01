<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $table = 'bank_accounts';

    protected $primaryKey = 'bank_id';

    public function user() {
        return $this->belongsTo(User::class, 'bank_user_id', 'id');
    }
}
