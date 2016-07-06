<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

    public function jobPosition()
    {
        return $this->hasOne('App\JobPosition', 'id', 'job_position_id');
    }
    
    public function getSalary()
    {
        if ($this->salary) {
            return $this->salary;
        } elseif ($this->jobPosition) {
            return $this->jobPosition->salary;
        }
        
        return 0;
    }
}
