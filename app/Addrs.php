<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addrs extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'pos',
        'contact',
    ];
    public $timestamps = false;
}
