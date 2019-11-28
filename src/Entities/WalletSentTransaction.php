<?php

namespace PostMix\LaravelBitaps\Entities;

class WalletSentTransaction
{

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $txHash;

    /**
     * @var int
     */
    private $out;

    /**
     * @var int
     */
    private $amount;

    /**
     * WalletSentTransaction constructor.
     *
     * @param string $address
     * @param string $txHash
     * @param int $out
     * @param int $amount
     */
    public function __construct(
        string $address,
        string $txHash,
        int $out,
        int $amount
    ) {
        $this->setAddress($address);
        $this->setTxHash($txHash);
        $this->setOut($out);
        $this->setAmount($amount);
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $value
     */
    public function setAddress(string $value)
    {
        $this->address = $value;
    }

    /**
     * @return string
     */
    public function getTxHash(): string
    {
        return $this->txHash;
    }

    /**
     * @param string $value
     */
    public function setTxHash(string $value)
    {
        $this->txHash = $value;
    }

    /**
     * @return int
     */
    public function getOut(): int
    {
        return $this->out;
    }

    /**
     * @param int $value
     */
    public function setOut(int $value)
    {
        $this->out = $value;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $value
     */
    public function setAmount(int $value)
    {
        $this->amount = $value;
    }
}
