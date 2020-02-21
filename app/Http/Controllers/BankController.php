<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

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
        
        return response()->json($data, 200);
    }
}
