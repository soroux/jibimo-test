<?php

namespace App\Services;

use App\Factory\Bank\BankFactoryInterface;
use App\Models\User;
use App\Repositories\BankRepository;

class BalanceService
{


    private BankRepository $bankRepository;

    public function __construct(BankRepository $bankRepository)
    {
        $this->bankRepository = $bankRepository;
    }


    public function userBalance($user){
        $banks = $user->banks;
        $totalBalance = 0;
        foreach ($banks as $bank){
            $factory = app(BankFactoryInterface::class);
            $service = $factory->make($bank->name);
            $userBankBalance = $service->getBalance($user->id);
            $totalBalance +=$userBankBalance;
        }
        return ['totalBalance'=>$totalBalance];

    }
}
