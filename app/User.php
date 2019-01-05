<?php

namespace App;

use App\Basket;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    protected $fillable = [
        'name', 'email','tgl', 'password', 'no_hp', 'j_k',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

}
