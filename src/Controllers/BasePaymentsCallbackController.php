<?php

namespace PostMix\LaravelBitaps\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use PostMix\LaravelBitaps\Services\TransactionCallback;

class BasePaymentsCallbackController extends Controller
{
    /**
     * @var TransactionCallback
     */
    private $transactionCallback;

    /**
     * PaymentsCallbackController constructor.
     */
    public function __construct()
    {
        $this->transactionCallback = new TransactionCallback();
    }

    /**
     * Return hash from the request
     *
     * @param Request $request
     *
     * @return Response
     */
    public function getCallback(Request $request)
    {
        return response($request->get('hash'), Response::HTTP_OK);
    }

    /**
     * Process callback of the Bitaps service
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function postCallback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required|string|exists:bitaps_addresses',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => trans('bitaps::messages.address_is_not_valid'),
            ]);
        }

        return $this->transactionCallback->handle($request);
    }
}
