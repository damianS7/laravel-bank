<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerAccount extends Model
{
    public $timestamps = false;

    public $fillable = [
        "account_id", "customer_id", "currency", "type", "created_on"
    ];

    public function account()
    {
        return $this->hasOne(
            'App\BankAccount',
            'id',
            //'account_id1',
        );
    }

    public function iban()
    {
        //return $this->account()->iban;
    }

    public function bic()
    {
        //return $this->account->bic();
    }
}
