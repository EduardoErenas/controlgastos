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
        'name', 'email', 'password' , 'usu_sex', 'usu_age' , 'usu_occupation' , 'usu_address' , 'usu_city' , 'usu_state' , 'usu_type' , 'usu_rango' , 'usu_algoritmo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
    ];
}
