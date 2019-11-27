<?php

namespace PostMix\LaravelBitaps\Entities;

class DomainDailyStatistic
{

    /**
     * @var int
     */
    private $invalidCount;

    /**
     * @var int
     */
    private $pendingReceivedCount;

    /**
     * @var int
     */
    private $pendingPaidCount;

    /**
     * @var int
     */
    private $pendingReceivedAmount;

    /**
     * @var int
     */
    private $datestamp;

    /**
     * @var int
     */
    private $addressCount;

    /**
     * @var int
     */
    private $receivedAmount;

    /**
     * @var int
     */
    private $successCallbacks;

    /**
     * @var int
     */
    private $failedCallbacks;

    /**
     * @var int
     */
    private $receivedCount;

    /**
     * @var int
     */
    private $paidCount;

    /**
     * @var int
     */
    private $serviceFeePaidAmount;

    /**
     * @var string
     */
    private $date;

    /**
     * @var int
     */
    private $pendingPaidAmount;

    /**
     * @var int
     */
    private $paidAmount;

    /**
     * DomainDailyStatistic constructor.
     *
     * @param int $invalidCount
     * @param int $pendingReceivedCount
     * @param int $pendingPaidCount
     * @param int $pendingReceivedAmount
     * @param int $datestamp
     * @param int $addressCount
     * @param int $receivedAmount
     * @param int $successCallbacks
     * @param int $failedCallbacks
     * @param int $receivedCount
     * @param int $paidCount
     * @param int $serviceFeePaidAmount
     * @param string $date
     * @param int $pendingPaidAmount
     * @param int $paidAmount
     */
    public function __construct(
        int $invalidCount,
        int $pendingReceivedCount,
        int $pendingPaidCount,
        int $pendingReceivedAmount,
        int $datestamp,
        int $addressCount,
        int $receivedAmount,
        int $successCallbacks,
        int $failedCallbacks,
        int $receivedCount,
        int $paidCount,
        int $serviceFeePaidAmount,
        string $date,
        int $pendingPaidAmount,
        int $paidAmount
    ) {
        $this->setInvalidCount($invalidCount);
        $this->setPendingReceivedCount($pendingReceivedCount);
        $this->setPendingPaidCount($pendingPaidCount);
        $this->setPendingReceivedAmount($pendingReceivedAmount);
        $this->setDatestamp($datestamp);
        $this->setAddressCount($addressCount);
        $this->setReceivedAmount($receivedAmount);
        $this->setSuccessCallbacks($successCallbacks);
        $this->setFailedCallbacks($failedCallbacks);
        $this->setReceivedCount($receivedCount);
        $this->setPaidCount($paidCount);
        $this->setServiceFeePaidAmount($serviceFeePaidAmount);
        $this->setDate($date);
        $this->setPendingPaidAmount($pendingPaidAmount);
        $this->setPaidAmount($paidAmount);
    }


    /**
     * @return int
     */
    public function getInvalidCount(): int
    {
        return $this->invalidCount;
    }

    /**
     * @param int $value
     */
    public function setInvalidCount(int $value)
    {
        $this->invalidCount = $value;
    }

    /**
     * @return int
     */
    public function getPendingReceivedCount(): int
    {
        return $this->pendingReceivedCount;
    }

    /**
     * @param int $value
     */
    public function setPendingReceivedCount(int $value)
    {
        $this->pendingReceivedCount = $value;
    }

    /**
     * @return int
     */
    public function getPendingPaidCount(): int
    {
        return $this->pendingPaidCount;
    }

    /**
     * @param int $value
     */
    public function setPendingPaidCount(int $value)
    {
        $this->pendingPaidCount = $value;
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
    public function getSuccessCallbacks(): int
    {
        return $this->successCallbacks;
    }

    /**
     * @param int $value
     */
    public function setSuccessCallbacks(int $value)
    {
        $this->successCallbacks = $value;
    }

    /**
     * @return int
     */
    public function getFailedCallbacks(): int
    {
        return $this->failedCallbacks;
    }

    /**
     * @param int $value
     */
    public function setFailedCallbacks(int $value)
    {
        $this->failedCallbacks = $value;
    }

    /**
     * @return int
     */
    public function getReceivedCount(): int
    {
        return $this->receivedCount;
    }

    /**
     * @param int $value
     */
    public function setReceivedCount(int $value)
    {
        $this->receivedCount = $value;
    }

    /**
     * @return int
     */
    public function getPaidCount(): int
    {
        return $this->paidCount;
    }

    /**
     * @param int $value
     */
    public function setPaidCount(int $value)
    {
        $this->paidCount = $value;
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
    public function getPendingPaidAmount(): int
    {
        return $this->pendingPaidAmount;
    }

    /**
     * @param int $value
     */
    public function setPendingPaidAmount(int $value)
    {
        $this->pendingPaidAmount = $value;
    }

    /**
     * @return int
     */
    public function getPaidAmount(): int
    {
        return $this->paidAmount;
    }

    /**
     * @param int $value
     */
    public function setPaidAmount(int $value)
    {
        $this->paidAmount = $value;
    }
}
