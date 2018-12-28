<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'desc', 'img', 'qyt', 'price', 'category_id',
    ];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
