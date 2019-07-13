<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function invoiceToClients() {
        return $this->hasMany('App\Invoice', 'client_id');
    }

    public function getTaxAttribute(){
        switch($this->sales_tax_rate) {
            case 1.00:
                return 0.00;
            case 2.00:
                return 0.08;
            case 3.00:
                return 0.1;
            case 4.00:
                return 0.05;
        }
    }
}
