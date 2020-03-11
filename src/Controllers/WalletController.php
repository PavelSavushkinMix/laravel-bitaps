<?php

namespace PostMix\LaravelBitaps\Controllers;

use App\Services\BitapsTransaction;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Process wallet callback requests
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     * TODO it should process requests
     */
    public function postCallbackWallet(Request $request)
    {
        $invoice = $request->get('invoice');

        echo $invoice;
        return response()->noContent();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData(Request $request)
    {

        $BitapsTransaction = new BitapsTransaction;
        $BitapsTransaction->newTransaction($request->all());

        return $this::sendResponse($request->input('invoice'));
    }


    /**
     * @param $invoice
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendResponse($invoice) {
        return response()->json(['invoice' => $invoice]);
    }
}
