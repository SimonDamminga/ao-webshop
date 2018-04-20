<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category_product extends Model
{
    protected $table = 'category_product';

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
