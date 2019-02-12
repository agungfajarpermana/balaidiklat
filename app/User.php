<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
      if($this->status == 1 || $this->status == 2) return true;
      return false;
    }

    public function isPusat()
    {
      if($this->status == 2) return true;
      return false;
    }

    public function isOwner()
    {
        if($this->status == 3) return true;
        return false;
    }
}
