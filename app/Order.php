<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderline()
    {
        return $this->hasMany('App\Orderline');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
