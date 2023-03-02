<?php

namespace App\Services\Shop;

use Faker\Core\Number;

interface BankServiceInterface
{
    public function getBalance($user);
}
