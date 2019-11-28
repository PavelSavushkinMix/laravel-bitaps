<?php

namespace PostMix\LaravelBitaps\Entities;

use PostMix\LaravelBitaps\Models\Wallet;

class WalletState
{
    /**
     * Wallet ID
     *
     * @var Wallet
     */
    private $wallet;

    /**
     * Wallet balance
     *
     * @var int
     */
    private $balanceAmount;

    /**
     * Wallet address count
     *
     * @var int
     */
    private $addressCount;

    /**
     * Date of creation of the wallet in UNIX timestamp format
     *
     * @var int
     */
    private $createDateTimestamp;

    /**
     * Outgoing transactions count
     *
     * @var int
     */
    private $sentTx;

    /**
     * Unconfirmed outgoing transactions count
     *
     * @var int
     */
    private $pendingSentTx;

    /**
     * Amount of paid service fee
     *
     * @var int
     */
    private $serviceFeePaidAmount;

    /**
     * Amount of unconfirmed transactions
     *
     * @var int
     */
    private $pendingReceivedAmount;

    /**
     * Count of incoming transactions
     *
     * @var int
     */
    private $receivedTx;

    /**
     * Creation time in format ISO UTC 0
     *
     * @var string
     */
    private $createDate;

    /**
     * Count of invalid transactions
     *
     * @var int
     */
    private $invalidTx;

    /**
     * Amount of outgoing transactions
     *
     * @var int
     */
    private $sentAmount;

    /**
     * Count of unconfirmed transactions
     *
     * @var int
     */
    private $pendingReceivedTx;

    /**
     * Last used Nonсе
     *
     * @var int
     */
    private $lastUsedNonce;

    /**
     * Amount of incoming transactions
     *
     * @var int
     */
    private $receivedAmount;

    /**
     * Amount of outgoing unconfirmed transactions
     *
     * @var int
     */
    private $pendingSentAmount;

    /**
     * WalletState constructor.
     *
     * @param Wallet $wallet
     * @param int $balanceAmount
     * @param int $addressCount
     * @param int $createDateTimestamp
     * @param int $sentTx
     * @param int $pendingSentTx
     * @param int $serviceFeePaidAmount
     * @param int $pendingReceivedAmount
     * @param int $receivedTx
     * @param string $createDate
     * @param int $invalidTx
     * @param int $sentAmount
     * @param int $pendingReceivedTx
     * @param int $lastUsedNonce
     * @param int $receivedAmount
     * @param int $pendingSentAmount
     */
    public function __construct(
        Wallet $wallet,
        int $balanceAmount,
        int $addressCount,
        int $createDateTimestamp,
        int $sentTx,
        int $pendingSentTx,
        int $serviceFeePaidAmount,
        int $pendingReceivedAmount,
        int $receivedTx,
        string $createDate,
        int $invalidTx,
        int $sentAmount,
        int $pendingReceivedTx,
        int $lastUsedNonce,
        int $receivedAmount,
        int $pendingSentAmount
    ) {
        $this->setWallet($wallet);
        $this->setBalanceAmount($balanceAmount);
        $this->setAddressCount($addressCount);
        $this->setCreateDateTimestamp($createDateTimestamp);
        $this->setSentTx($sentTx);
        $this->setPendingSentTx($pendingSentTx);
        $this->setServiceFeePaidAmount($serviceFeePaidAmount);
        $this->setPendingReceivedAmount($pendingReceivedAmount);
        $this->setReceivedTx($receivedTx);
        $this->setCreateDate($createDate);
        $this->setInvalidTx($invalidTx);
        $this->setSentAmount($sentAmount);
        $this->setPendingReceivedTx($pendingReceivedTx);
        $this->setLastUsedNonce($lastUsedNonce);
        $this->setReceivedAmount($receivedAmount);
        $this->setPendingSentAmount($pendingSentAmount);
    }


    /**
     * @return Wallet
     */
    public function getWallet(): Wallet
    {
        return $this->wallet;
    }

    /**
     * @param Wallet $value
     */
    public function setWallet(Wallet $value)
    {
        $this->wallet = $value;
    }

    /**
     * @return int
     */
    public function getBalanceAmount(): int
    {
        return $this->balanceAmount;
    }

    /**
     * @param int $value
     */
    public function setBalanceAmount(int $value)
    {
        $this->balanceAmount = $value;
    }

    /**
     * @return int
     */
    public function getAddressCount(): int
    {
        return $this->addressCount;
    }

    /**
     * @param int $value
     */
    public function setAddressCount(int $value)
    {
        $this->addressCount = $value;
    }

    /**
     * @return string
     */
    public function getCreateDateTimestamp(): string
    {
        return $this->createDateTimestamp;
    }

    /**
     * @param string $value
     */
    public function setCreateDateTimestamp(string $value)
    {
        $this->createDateTimestamp = $value;
    }

    /**
     * @return int
     */
    public function getSentTx(): int
    {
        return $this->sentTx;
    }

    /**
     * @param int $value
     */
    public function setSentTx(int $value)
    {
        $this->sentTx = $value;
    }

    /**
     * @return int
     */
    public function getPendingSentTx(): int
    {
        return $this->pendingSentTx;
    }

    /**
     * @param int $value
     */
    public function setPendingSentTx(int $value)
    {
        $this->pendingSentTx = $value;
    }

    /**
     * @return int
     */
    public function getServiceFeePaidAmount(): int
    {
        return $this->serviceFeePaidAmount;
    }

    /**
     * @param int $value
     */
    public function setServiceFeePaidAmount(int $value)
    {
        $this->serviceFeePaidAmount = $value;
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
     * @return string
     */
    public function getCreateDate(): int
    {
        return $this->createDate;
    }

    /**
     * @param int $value
     */
    public function setCreateDate(int $value)
    {
        $this->createDate = $value;
    }

    /**
     * @return int
     */
    public function getInvalidTx(): int
    {
        return $this->invalidTx;
    }

    /**
     * @param int $value
     */
    public function setInvalidTx(int $value)
    {
        $this->invalidTx = $value;
    }

    /**
     * @return int
     */
    public function getSentAmount(): int
    {
        return $this->sentAmount;
    }

    /**
     * @param int $value
     */
    public function setSentAmount(int $value)
    {
        $this->sentAmount = $value;
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
    public function getLastUsedNonce(): int
    {
        return $this->lastUsedNonce;
    }

    /**
     * @param int $value
     */
    public function setLastUsedNonce(int $value)
    {
        $this->lastUsedNonce = $value;
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
    public function getPendingSentAmount(): int
    {
        return $this->pendingSentAmount;
    }

    /**
     * @param int $value
     */
    public function setPendingSentAmount(int $value)
    {
        $this->pendingSentAmount = $value;
    }
}
