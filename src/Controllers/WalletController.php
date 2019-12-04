<?php

namespace PostMix\LaravelBitaps\Controllers;

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
     * Process wallet's address callback requests
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     * TODO it should process requests
     */
    public function postCallbackAddress(Request $request)
    {
        $invoice = $request->get('invoice');

        echo $invoice;
        return response()->noContent();
    }
}
