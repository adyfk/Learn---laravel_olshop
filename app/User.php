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
    public static function boot()
    {
        parent::boot();
        self::created(function ($user) {
            Basket::create([
                'user_id' => $user->attributes['id'],
            ]);
        });
    }

    protected $fillable = [
        'name', 'email', 'password', 'no_hp', 'j_k',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

}
