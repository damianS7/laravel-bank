<?php

namespace App\Services;

use Auth;
use App\Customer;
use App\BankAccount;
use App\CustomerAccount;

class CustomerAccountService
{
    public function contractProduct($request)
    {
        // ID del usuario logeado en la app
        $currentUserId = Auth::user()->id;

        // Buscamos una cuenta que este sin uso
        $bankAccount = Bankaccount::where('status', 'free')->first();
        
        // Asociamos la cuenta al usuario
        $customerAccount = new CustomerAccount([
            "account_id" => $bankAccount->id,
            "customer_id" => $currentUserId,
            //"currency" => $request->input("account.currency"),
            "type" => $request->input("account.type"),
            "created_on" => date("Y-m-d H:i:s")
        ]);

        // Guardamos los cambios
        $bankAccount->status = "used";
        $bankAccount->save();
        $customerAccount->save();

        // Se devuelven ambos modelos unidos.
        return array_merge($customerAccount->toArray(), $bankAccount->toArray());
    }
}
