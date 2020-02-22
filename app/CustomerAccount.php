<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerAccount extends Model
{
    public $timestamps = false;

    public $fillable = [
        "account_id", "customer_id", "currency", "type", "created_on"
    ];
}
