<?php

namespace Tests\Feature;

use App\Factory\Bank\BankFactoryInterface;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class BankServicesTest extends TestCase
{
    function setup():void {
        parent::setUp();
        Http::fake([
            'https://banks.free.beeceptor.com/a-bank/amount/*' => Http::response(['amount' => 200], 200,['Headers']),
            'https://banks.free.beeceptor.com/b-bank/balance/*' => Http::response(['balance' => 100], 200,['Headers']),
            'https://banks.free.beeceptor.com/c-bank/value/*' => Http::response(['value' => 300], 200,['Headers']),
        ]);
    }
    /**
     * A basic feature test example.
     */
    public function test_a_bank_Service_returns_balance(): void
    {

        $factory = app(BankFactoryInterface::class);
        $service = $factory->make('a');
        $user = User::first();
        $amount = $service->getBalance($user->id);
        self::assertEquals(200
        , $amount);
    }
    /**
     * A basic feature test example.
     */
    public function test_b_bank_Service_returns_balance(): void
    {

        $factory = app(BankFactoryInterface::class);
        $service = $factory->make('b');
        $user = User::first();
        $amount = $service->getBalance($user->id);
        self::assertEquals(100
            , $amount);
    }
    /**
     * A basic feature test example.
     */
    public function test_c_bank_Service_returns_balance(): void
    {

        $factory = app(BankFactoryInterface::class);
        $service = $factory->make('c');
        $user = User::first();
        $amount = $service->getBalance($user->id);
        self::assertEquals(300
            , $amount);
    }
}
