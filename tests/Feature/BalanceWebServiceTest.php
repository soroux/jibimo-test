<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class BalanceWebServiceTest extends TestCase
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
     * A basic test example.
     */
    public function test_the_user_balance_api_returns_a_successful_response(): void
    {

        $response = $this->get('/api/user-balance/1');

        $response->assertStatus(200)->assertJson(['totalBalance'=>600]);
    }
}
