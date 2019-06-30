<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function invoiceToClients() {
        return $this->hasMany('App\Invoice', 'client_id');
    }
}
