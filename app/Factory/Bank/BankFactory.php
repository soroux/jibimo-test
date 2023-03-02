<?php

namespace App\Factory\Bank;


use App\Services\Shop\ABankService;
use App\Services\Shop\BBankService;
use App\Services\Shop\CBankService;
use App\Services\Shop\BankServiceInterface;
use Illuminate\Support\Arr;

class BankFactory implements BankFactoryInterface
{

    private $shops = [];

    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function make($name): BankServiceInterface
    {
        $service = Arr::get($this->shops, $name);

        // No need to create the service every time
        if ($service) {
            return $service;
        }

        $createMethod = 'create' . ucfirst($name) . 'BankService';
        if (!method_exists($this, $createMethod)) {
            throw new \Exception("Bank $name is not supported");
        }

        $service = $this->{$createMethod}();

        $this->shops[$name] = $service;

        return $service;
    }

    private function createABankService(): ABankService
    {
        $config = $this->app['config']['banks.a_bank'];
        $service = new ABankService($config);
        $service->setConfig($config);
        return $service;
    }
    private function createBBankService(): BBankService
    {
        $config = $this->app['config']['banks.b_bank'];
        $service = new BBankService($config);
        $service->setConfig($config);

        return $service;
    }
    private function createCBankService(): CBankService
    {
        $config = $this->app['config']['banks.c_bank'];
        $service = new CBankService($config);
        $service->setConfig($config);

        return $service;
    }

}
