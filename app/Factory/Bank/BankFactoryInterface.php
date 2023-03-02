<?php

namespace App\Factory\Bank;
use App\Services\Shop\BankServiceInterface;

interface BankFactoryInterface
{
    public function make($name): BankServiceInterface;
}
