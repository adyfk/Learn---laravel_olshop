<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'product_id', 'category_id',
    ];
    public $timestamps = false;
}
