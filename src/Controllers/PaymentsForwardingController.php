<?php

namespace PostMix\LaravelBitaps\Controllers;

use PostMix\LaravelBitaps\Contracts\ITransaction;
use Illuminate\Http\Request;
use PostMix\LaravelBitaps\Models\Transaction;
use PostMix\LaravelBitaps\Models\Transaction as TransactionModel;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

/**
 * Class PaymentsForwardingController
 * @package PostMix\LaravelBitaps\Controllers
 */
class PaymentsForwardingController extends Controller
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
