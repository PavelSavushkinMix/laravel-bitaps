<?php

namespace PostMix\LaravelBitaps\Entities;

class WalletStatistic
{

    /**
     * Balance at the end of the day
     *
     * @var int
     */
    private $balanceAmount;

    /**
     * Date
     *
     * @var string
     */
    private $date;

    /**
     * Date in format UNIX timestamp / 86400
     *
     * @var int
     */
    private $datestamp;

    /**
     * Count of wallet addresses
     *
     * @var int
     */
    private $addressCount;

    /**
     * Amount received per day
     *
     * @var int
     */
    private $receivedAmount;

    /**
     * Count of recharge transactions per day
     *
     * @var int
     */
    private $receivedTx;

    /**
     * Unconfirmed amount received per day at the end of the day
     *
     * @var int
     */
    private $pendingReceivedAmount;

    /**
     * Count of unconfirmed recharge transactions per day at the end of the day
     *
     * @var int
     */
    private $pendingReceivedTx;

    /**
     * Unconfirmed amount including previous days at the end of the day
     *
     * @var int
     */
    private $pendingReceivedAmountTotal;

    /**
     * Count of unconfirmed recharge transactions including previous days at
     * the end of the day
     *
     * @var int
     */
    private $pendingReceivedTxTotal;

    /**
     * Amount sent per day
     *
     * @var int
     */
    private $sentAmount;

    /**
     * Count of daily debit transactions
     *
     * @var int
     */
    private $sentTx;

    /**
     * Unconfirmed amount sent per day at the end of the day
     *
     * @var int
     */
    private $pendingSentAmount;

    /**
     * Count of uncommitted transactions sent per day at the end of the day
     *
     * @var int
     */
    private $pendingSentTx;

    /**
     * Unconfirmed sent amount including previous days at the end of the day
     *
     * @var int
     */
    private $pendingSentAmountTotal;

    /**
     * Count of unconfirmed balance sent transactions including previous days
     * at the end of the day
     *
     * @var int
     */
    private $pendingSentTxTotal;

    /**
     * Service fee paid
     *
     * @var int
     */
    private $serviceFeePaidAmount;

    /**
     * @var int
     */
    private $invalidTx;

    /**
     * WalletStatistic constructor.
     *
     * @param int $balanceAmount
     * @param string $date
     * @param int $datestamp
     * @param int $addressCount
     * @param int $receivedAmount
     * @param int $receivedTx
     * @param int $pendingReceivedAmount
     * @param int $pendingReceivedTx
     * @param int $pendingReceivedAmountTotal
     * @param int $pendingReceivedTxTotal
     * @param int $sentAmount
     * @param int $sentTx
     * @param int $pendingSentAmount
     * @param int $pendingSentTx
     * @param int $pendingSentAmountTotal
     * @param int $pendingSentTxTotal
     * @param int $serviceFeePaidAmount
     * @param int $invalidTx
     */
    public function __construct(
        int $balanceAmount,
        string $date,
        int $datestamp,
        int $addressCount,
        int $receivedAmount,
        int $receivedTx,
        int $pendingReceivedAmount,
        int $pendingReceivedTx,
        int $pendingReceivedAmountTotal,
        int $pendingReceivedTxTotal,
        int $sentAmount,
        int $sentTx,
        int $pendingSentAmount,
        int $pendingSentTx,
        int $pendingSentAmountTotal,
        int $pendingSentTxTotal,
        int $serviceFeePaidAmount,
        int $invalidTx
    ) {
        $this->setBalanceAmount($balanceAmount);
        $this->setDate($date);
        $this->setDatestamp($datestamp);
        $this->setAddressCount($addressCount);
        $this->setReceivedAmount($receivedAmount);
        $this->setReceivedTx($receivedTx);
        $this->setPendingReceivedAmount($pendingReceivedAmount);
        $this->setPendingReceivedTx($pendingReceivedTx);
        $this->setPendingReceivedAmountTotal($pendingReceivedAmountTotal);
        $this->setPendingReceivedTxTotal($pendingReceivedTxTotal);
        $this->setSentAmount($sentAmount);
        $this->setSentTx($sentTx);
        $this->setPendingSentAmount($pendingSentAmount);
        $this->setPendingSentTx($pendingSentTx);
        $this->setPendingSentAmountTotal($pendingSentAmountTotal);
        $this->setPendingSentTxTotal($pendingSentTxTotal);
        $this->setServiceFeePaidAmount($serviceFeePaidAmount);
        $this->setInvalidTx($invalidTx);
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
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $value
     */
    public function setDate(string $value)
    {
        $this->date = $value;
    }

    /**
     * @return int
     */
    public function getDatestamp(): int
    {
        return $this->datestamp;
    }

    /**
     * @param int $value
     */
    public function setDatestamp(int $value)
    {
        $this->datestamp = $value;
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
    public function getPendingReceivedAmountTotal(): int
    {
        return $this->pendingReceivedAmountTotal;
    }

    /**
     * @param int $value
     */
    public function setPendingReceivedAmountTotal(int $value)
    {
        $this->pendingReceivedAmountTotal = $value;
    }

    /**
     * @return int
     */
    public function getPendingReceivedTxTotal(): int
    {
        return $this->pendingReceivedTxTotal;
    }

    /**
     * @param int $value
     */
    public function setPendingReceivedTxTotal(int $value)
    {
        $this->pendingReceivedTxTotal = $value;
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
    public function getPendingSentAmountTotal(): int
    {
        return $this->pendingSentAmountTotal;
    }

    /**
     * @param int $value
     */
    public function setPendingSentAmountTotal(int $value)
    {
        $this->pendingSentAmountTotal = $value;
    }

    /**
     * @return int
     */
    public function getPendingSentTxTotal(): int
    {
        return $this->pendingSentTxTotal;
    }

    /**
     * @param int $value
     */
    public function setPendingSentTxTotal(int $value)
    {
        $this->pendingSentTxTotal = $value;
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
}
