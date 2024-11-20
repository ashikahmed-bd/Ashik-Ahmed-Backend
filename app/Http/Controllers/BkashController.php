<?php

namespace App\Http\Controllers;

use App\Services\BkashService;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;

class BkashController extends Controller
{
    protected $bkashService;


    public function __construct(BkashService $bkashService)
    {
        $this->bkashService = $bkashService;
    }


    /**
     * @throws ConnectionException
     */
    public function create(Request $request)
    {
        $request->validate([
            'amount' => ['required'],
            'reference' => ['required'],
        ]);

        $amount = $request->input('amount');
        $reference = $request->input('reference');

        $payment = $this->bkashService->createPayment($amount, $reference);
        return response()->json($payment);
    }


    /**
     * @throws ConnectionException
     */
    public function execute(Request $request)
    {
        $request->validate([
            'paymentID' => 'required|string',
        ]);

        $paymentID = $request->input('paymentID');

        $result = $this->bkashService->executePayment($paymentID);
        return response()->json($result);
    }


    public function callback()
    {
        return view('callback');
    }


}
