<?php

namespace Tests\Feature;

use App\Factory\Bank\BankFactoryInterface;
use App\Services\Shop\ABankService;
use App\Services\Shop\BBankService;
use App\Services\Shop\CBankService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BankFactoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_bank_factory_creates_a_bank_service(): void
    {
        $factory = app(BankFactoryInterface::class);
        $service = $factory->make('a');
        $this->assertInstanceOf(ABankService::class,$service);
    }
    /**
     * A basic feature test example.
     */
    public function test_bank_factory_creates_b_bank_service(): void
    {
        $factory = app(BankFactoryInterface::class);
        $service = $factory->make('b');
        $this->assertInstanceOf(BBankService::class,$service);
    }
    /**
     * A basic feature test example.
     */
    public function test_bank_factory_creates_c_bank_service(): void
    {
        $factory = app(BankFactoryInterface::class);
        $service = $factory->make('c');
        $this->assertInstanceOf(CBankService::class,$service);
    }
}
