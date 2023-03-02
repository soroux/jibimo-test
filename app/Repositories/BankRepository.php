<?php

namespace App\Repositories;

use App\Models\Bank;
use App\Repositories\BaseRepository\BaseRepository;

class BankRepository extends BaseRepository
{
    protected $model = Bank::class;

}
