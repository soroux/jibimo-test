<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\BalanceService;

class BalanceController extends Controller
{
    //
    /**
     * @param BalanceService $balanceService
     */
    public function __construct(BalanceService $balanceService)
    {
        $this->balanceService = $balanceService;
    }


    public function userBalance(User $user){
        $balance = $this->balanceService->userBalance($user);
        return response()->json($balance,200);
    }
}
