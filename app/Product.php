<?php

namespace App;

use App\Category_product as Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function boot()
    {
        parent::boot();
        self::created(function ($product) {
            Category::create([
                'product_id' => $product->attributes['id'],
            ]);
        });
    }
    protected $fillable = [
        'title', 'desc', 'img', 'qyt', 'price',
    ];
}
