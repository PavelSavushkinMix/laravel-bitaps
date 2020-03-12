<?php

namespace PostMix\LaravelBitaps\Controllers;

use PostMix\LaravelBitaps\Contracts\ITransaction;
use Illuminate\Http\Request;
use PostMix\LaravelBitaps\Models\Transaction as TransactionModel;

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function postCallback(TransactionModel $transaction, Request $request): TransactionModel
    {
        $bitapsTransaction = $this->service->makeTransaction($transaction, $request->all());
        return $this->sendResponse($request->input('invoice'));
    }

    /**
     * @param $invoice
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendResponse($invoice) {
        return response()->json(['invoice' => $invoice]);
    }
}
