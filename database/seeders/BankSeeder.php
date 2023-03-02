<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Bank::insert([
            [
                'name' => 'a',
                'url'=>'https://banks.free.beeceptor.com/a-bank/amount'
            ],
            [
                'name' => 'b',
                'url'=>'https://banks.free.beeceptor.com/b-bank/balance'
            ],
            [
                'name' => 'c',
                'url'=>'https://banks.free.beeceptor.com/c-bank/value'
            ],

        ]);
    }
}
