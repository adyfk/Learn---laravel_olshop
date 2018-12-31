<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    protected $fillable = [
            'user_id',
            'price',
            'addrs_id',
            'payment',
            'status', 
    ];
    public function detail()
    {
        return $this->hasMany('App\OrderDetail');
    }
    

}
