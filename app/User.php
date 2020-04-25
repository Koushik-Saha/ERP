<?php

namespace App;

use App\Models\Projects;
use App\Models\Role;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use phpDocumentor\Reflection\Project;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;


    protected $table = 'users';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    public function isAdmin() {
        return $this->role->role_slug === 'administrator';
    }

    public function isManager() {
        return $this->role->role_slug === 'manager';
    }

    public function isProjectManager() {
        return $this->role->role_slug === 'project_manager';
    }

    public function isAccountant() {
        return $this->role->role_slug === 'accountant';
    }

    public function isClient() {
        return $this->role->role_slug === 'accountant';
    }

    public function isLabour() {
        return $this->role->role_slug === 'accountant';
    }



    public function clientProjects()
    {
        return $this->hasMany(Projects::class, 'project_client_id', 'id');
    }



}
