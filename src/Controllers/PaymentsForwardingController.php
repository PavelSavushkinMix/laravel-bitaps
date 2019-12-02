<?php

namespace PostMix\Controllers;

use Illuminate\Http\Request;

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
}
