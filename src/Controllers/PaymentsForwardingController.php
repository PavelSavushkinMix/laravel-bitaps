<?php

namespace PostMix\LaravelBitaps\Controllers;

use Illuminate\Http\Request;
use App\Services\BitapsTransaction;

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
        $BitapsTransaction = new BitapsTransaction;
        $BitapsTransaction->newTransaction($request->all());

        return $this::sendResponse($request->input('invoice'));
    }


    /**
     * @param $invoice
     * @return mixed
     */
    protected function sendResponse($invoice) {
        return response()->json(['invoice' => $invoice]);
    }
}
