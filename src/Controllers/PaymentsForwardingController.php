<?php

namespace PostMix\LaravelBitaps\Controllers;

use Illuminate\Http\Request;
use PostMix\LaravelBitaps\Services\BitapsTransaction;
use PostMix\LaravelBitaps\Models\Transaction;
use PostMix\LaravelBitaps\Contracts\ITransaction;

class PaymentsForwardingController extends Controller
{
    /**
     * @var
     */
    private $service;

    /**
     * PaymentsForwardingController constructor.
     */
    public function __construct()
    {
        $this->service = app()->make(ITransaction::class);
    }

    /**
     * Return hash from request
     *
     * @param Request $request
     */
    public function getCallback(Request $request)
    {
        echo $request->get('hash');

        return response()->noContent(200);
    }

    /**
     * Process callback requests
     *
     * @param Request $request
     *
     * @return string
     * TODO it should process requests
     */
    public function postCallback(Transaction $transaction, Request $request)
    {
        $bitapsTransaction = new BitapsTransaction;
        $bitapsTransaction->newTransaction($transaction, $request->all());

        return $this::sendResponse($request->input('invoice'));
    }


    /**
     * return invoice for confirmations Transaction
     * @param $invoice
     * @return string
     */
    protected function sendResponse($invoice):string {
        return response()->json(['invoice' => $invoice]);
    }
}
