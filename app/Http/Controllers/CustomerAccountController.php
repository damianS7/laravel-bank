<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Services\CustomerAccountService;
use App\Http\Requests\CustomerAccountRequest;

class CustomerAccountController extends Controller
{
    public function __construct(CustomerAccountService $customerAccountService)
    {
        $this->middleware('auth');
        $this->customerAccountService = $customerAccountService;
    }

    public function contractProduct(CustomerAccountRequest $request)
    {
        $account = $this->customerAccountService->contractProduct($request);
        
        return response()->json(["account" => $account], 200);
    }

    public function update(CustomerAccountRequest $request)
    {
        $account = $this->customerAccountService->updateAccount($request);
        return response()->json(["account" => $account], 200);
    }
}
