<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class BkashService
{

    protected $base_url;

    protected $token;

    public function __construct()
    {
        $this->base_url = config('bkash.base_url');
    }

    /**
     * @throws ConnectionException
     */
    public function getAccessToken()
    {
        $response = Http::acceptJson()->withHeaders([
            'username' => config('bkash.username'),
            'password' => config('bkash.password'),
        ])->post("{$this->base_url}/v1.2.0-beta/tokenized/checkout/token/grant", [
                'app_key' => config('bkash.app_key'),
                'app_secret' => config('bkash.app_secret'),
            ]);

        if ($response->successful()) {
            $this->token = $response->json('id_token');
            return $this->token;
        }

        return null;
    }


    /**
     * @throws ConnectionException
     */
    public function createPayment($amount, $reference)
    {

        if (!$this->token) {
            $this->getAccessToken();
        }

        $response = Http::withHeaders([
            'Authorization' => $this->token,
            'X-APP-Key' => config('bkash.app_key'),
        ])->post("{$this->base_url}/v1.2.0-beta/tokenized/checkout/create", [
            'amount' => $amount,
            'currency' => 'BDT',
            'payerReference' => $reference,
            'mode' => '0011',
            'intent' => 'sale',
            'merchantInvoiceNumber' => uniqid(),
            'callbackURL' => client_url('callback'),
        ]);

        return $response->json();
    }


    /**
     * @throws ConnectionException
     */
    public function executePayment(string $paymentID)
    {
        if (!$this->token) {
            $this->getAccessToken();
        }

        $response = Http::withHeaders([
            'Authorization' => $this->token,
            'X-APP-Key' => config('bkash.app_key'),
        ])->post("{$this->base_url}/v1.2.0-beta/tokenized/checkout/execute", [
            'paymentID' => $paymentID,
        ]);

        return $response->json();
    }

}
