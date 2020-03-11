<?php

namespace PostMix\LaravelBitaps\Controllers;

use Illuminate\Http\Request;
use PostMix\LaravelBitaps\Services\BitapsTransaction;
use PostMix\LaravelBitaps\Models\Transaction;

class PaymentsForwardingController extends Controller
{
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
     * @return \Illuminate\Http\Response
     * TODO it should process requests
     */
    public function postCallback(Request $request)
    {
        $bitapsTransaction = new BitapsTransaction;
        $bitapsTransaction->newTransaction(Transaction $transaction, $request->all());

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
