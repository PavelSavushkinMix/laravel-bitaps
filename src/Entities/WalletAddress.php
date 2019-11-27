<?php

namespace PostMix\LaravelBitaps\Entities;

class WalletAddress
{
    /**
     * Amount received by the address
     *
     * @var int
     */
    private $receivedAmount;

    /**
     * Count of incoming transactions received by the address
     *
     * @var int
     */
    private $receivedTx;

    /**
     * Pending amount received by the address
     *
     * @var int
     */
    private $pendingReceivedAmount;

    /**
     * Count of incoming unconfirmed transactions received by the address
     *
     * @var int
     */
    private $pendingReceivedTx;

    /**
     * Date of creation of the address in the format UNIX timestamp
     *
     * @var int
     */
    private $timestamp;

    /**
     * Date of creation of the address in the format ISO UTC 0
     *
     * @var string
     */
    private $time;

    /**
     * Address
     *
     * @var string
     */
    private $address;

    /**
     * WalletAddress constructor.
     *
     * @param int $receivedAmount
     * @param int $receivedTx
     * @param int $pendingReceivedAmount
     * @param int $pendingReceivedTx
     * @param int $timestamp
     * @param string $time
     * @param string $address
     */
    public function __construct(
        int $receivedAmount,
        int $receivedTx,
        int $pendingReceivedAmount,
        int $pendingReceivedTx,
        int $timestamp,
        string $time,
        string $address
    ) {
        $this->setReceivedAmount($receivedAmount);
        $this->setReceivedTx($receivedTx);
        $this->setPendingReceivedAmount($pendingReceivedAmount);
        $this->setPendingReceivedTx($pendingReceivedTx);
        $this->setTimestamp($timestamp);
        $this->setTime($time);
        $this->setAddress($address);
    }

    /**
     * @return int
     */
    public function getReceivedAmount(): int
    {
        return $this->receivedAmount;
    }

    /**
     * @param int $value
     */
    public function setReceivedAmount(int $value)
    {
        $this->receivedAmount = $value;
    }

    /**
     * @return int
     */
    public function getReceivedTx(): int
    {
        return $this->receivedTx;
    }

    /**
     * @param int $value
     */
    public function setReceivedTx(int $value)
    {
        $this->receivedTx = $value;
    }

    /**
     * @return int
     */
    public function getPendingReceivedAmount(): int
    {
        return $this->pendingReceivedAmount;
    }

    /**
     * @param int $value
     */
    public function setPendingReceivedAmount(int $value)
    {
        $this->pendingReceivedAmount = $value;
    }

    /**
     * @return int
     */
    public function getPendingReceivedTx(): int
    {
        return $this->pendingReceivedTx;
    }

    /**
     * @param int $value
     */
    public function setPendingReceivedTx(int $value)
    {
        $this->pendingReceivedTx = $value;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @param int $value
     */
    public function setTimestamp(int $value)
    {
        $this->timestamp = $value;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param string $value
     */
    public function setTime(string $value)
    {
        $this->time = $value;
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
}
