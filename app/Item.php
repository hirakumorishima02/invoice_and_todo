<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function invoice() {
        return $this->belongsTo('App\Invoice','invoice_id');
    }
    public function bill() {
        return $this->belongsTo('App\Bill','bill_id');
    }
}
