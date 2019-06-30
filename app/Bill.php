<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function invoice() {
        return $this->belongsTo('App\Invoice','invoice_id');
    }
    public function itemToBill() {
        return $this->hasMany('App\Bill','bill_id');
    }
}
