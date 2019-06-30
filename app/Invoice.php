<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function client() {
        return $this->belongsTo('App\Client','client_id');
    }
    public function billToInvoice() {
        return $this->hasMany('App\Bill','invoice_id');
    }    
    public function itemToInvoice() {
        return $this->hasMany('App\item','invoice_id');
    }
}
