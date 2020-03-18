<?php

namespace PostMix\LaravelBitaps\Controllers;

use PostMix\LaravelBitaps\Contracts\ITransaction;
use Illuminate\Http\Request;
use PostMix\LaravelBitaps\Models\Transaction;
use PostMix\LaravelBitaps\Models\Transaction as TransactionModel;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

/**
 * Class WalletController
 * @package PostMix\LaravelBitaps\Controllers
 */
class WalletController extends Controller
{
    /**
     * @var ITransaction
     */
    private $service;

    /**
     * PaymentsForwardingController constructor.
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __construct()
    {
        $this->service = app()->make(ITransaction::class);
    }

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
    /**
     * @param TransactionModel $transaction
     * @param Request $request
     * @return Response
     */
    public function postCallback(TransactionModel $transaction, Request $request): Response
    {
        if ($this->validationAddress($request) === true) {
            return response()->json(['message' => trans('Data is valid')]);
        } else {
            $bitapsTransaction = $this->service->makeTransaction($transaction, $request->all());
            return $this->sendResponse($request->input('invoice'));
        }
    }

    /**
     * @param $invoice
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendResponse($invoice) {
        return response()->json(['invoice' => $invoice]);
    }

    /**
     * @param Request $request
     * @return bool
     */
    protected function validationAddress(Request $request) {
        $validator = Validator::make($request->all(), [
            'address' => 'required|string|exists:bitaps_addresses,address'
        ]);
        return $validator->fails();
    }
}
