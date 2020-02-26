<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\CustomerAccount;
use App\BankAccount;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('bankapp');
    }

    public function fetch()
    {
        // ID del usuario logeado en la app
        $currentUserId = Auth::user()->id;
        
        // Datos de usuario
        $data['app_user'] = Auth::user();

        // Cuentas bancarias del usuario
        $data['accounts'] = CustomerAccount::with(
            ["account:id,iban,bic"]
        )->where("customer_id", $currentUserId)->get()->keyBy("id");
        
        return response()->json($data, 200);
    }
}
