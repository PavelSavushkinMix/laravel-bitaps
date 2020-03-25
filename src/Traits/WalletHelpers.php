<?php

namespace PostMix\LaravelBitaps\Traits;

use PostMix\LaravelBitaps\Models\Wallet;

trait WalletHelpers
{
    /**
     * Generate Access-Nonce and Access-Signature headers
     *
     * @param Wallet $wallet
     * @param array $params
     *
     * @return array
     */
    protected function getWalletAccessHeaders(
        Wallet $wallet,
        array $params
    ): array {
        $params = count($params) > 0 ? json_encode($params) : '';
        $nonce = round(microtime(true) * 10000);
        $key = hash('sha256',
            (hash('sha256', $wallet->wallet_id . $wallet->password, true)),
            true);
        $msg = $wallet->wallet_hash . $params . $nonce;
        $signature = hash_hmac('sha256', $msg, $key);

        return [
            'Access-Nonce' => $nonce,
            'Access-Signature' => $signature,
        ];
    }
}
