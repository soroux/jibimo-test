<?php
namespace App\Services\Shop;

use Illuminate\Support\Facades\Http;

class CBankService implements BankServiceInterface
{

    private $url;

    public function getBalance($user)
    {
        $response = Http::get($this->url.'/'.$user);
        $balance = $response->json(['value']);
        return $balance;
    }

    public function setConfig($config)
    {
        $this->url = $config['url'];
    }
}
