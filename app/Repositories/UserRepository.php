<?php

namespace App\Repositories;

use App\Models\Bank;
use App\Models\User;
use App\Repositories\BaseRepository\BaseRepository;

class UserRepository extends BaseRepository
{
    protected $model = User::class;

}
