<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
    public function musics(){
        return $this->belongsToMany('App\Music')->using('App\UserMusic');
    }
    public function roles(){
        return $this->belongsToMany('App\Role', 'role_user')->using("App\UserRole");
    }
}
