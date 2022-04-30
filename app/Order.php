<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer(){
        return $this->belongsTo('App\Customer', 'foreign_key');
    }
    public function product(){
        return $this->belongsTo('App\Product', 'foreign_key');
    }
}
