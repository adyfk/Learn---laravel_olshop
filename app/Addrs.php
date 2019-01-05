<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addrs extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'nama',
        'prov',
        'kab',
        'kec',
        'alamat',
        'pos',
        'contact',
        'selected',
    ];
    public $timestamps = false;
}
