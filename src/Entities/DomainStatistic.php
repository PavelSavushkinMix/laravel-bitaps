<?php

namespace PostMix\LaravelBitaps\Entities;

class DomainStatistic
{

    /**
     * Count of created addresses
     *
     * @var int
     */
    private $addressCount;

    /**
     * Amount of pending payments
     *
     * @var int
     */
    private $pendingReceived;

    /**
     * Domain status
     *
     * @var string
     */
    private $status;

    /**
     * Service fee for domain
     *
     * @var int
     */
    private $serviceFee;

    /**
     * Payout amount
     *
     * @var int
     */
    private $paid;

    /**
     * Success callback notifications count
     *
     * @var int
     */
    private $successCallbacks;

    /**
     * Failed callback notificatins count
     *
     * @var int
     */
    private $failedCallbacks;

    /**
     * Transactions count
     *
     * @var int
     */
    private $transactionCount;

    /**
     * Domain
     *
     * @var string
     */
    private $domain;

    /**
     * Unconfirmed transactions count
     *
     * @var int
     */
    private $pendingTransactionCount;

    /**
     * Invalid transactions count
     *
     * @var int
     */
    private $invalidTransactionCount;

    /**
     * Total fee paid
     *
     * @var int
     */
    private $feePaid;

    /**
     * Amount of pending payout
     *
     * @var int
     */
    private $pendingPaid;

    /**
     * Total amount of payments received
     *
     * @var int
     */
    private $received;

    /**
     * Registration date
     *
     * @var int
     */
    private $createDate;

    /**
     * DomainStatistic constructor.
     *
     * @param int $addressCount
     * @param int $pendingReceived
     * @param string $status
     * @param int $serviceFee
     * @param int $paid
     * @param int $successCallbacks
     * @param int $failedCallbacks
     * @param int $transactionCount
     * @param string $domain
     * @param int $pendingTransactionCount
     * @param int $invalidTransactionCount
     * @param int $feePaid
     * @param int $pendingPaid
     * @param int $received
     * @param int $createDate
     */
    public function __construct(
        int $addressCount,
        int $pendingReceived,
        string $status,
        int $serviceFee,
        int $paid,
        int $successCallbacks,
        int $failedCallbacks,
        int $transactionCount,
        string $domain,
        int $pendingTransactionCount,
        int $invalidTransactionCount,
        int $feePaid,
        int $pendingPaid,
        int $received,
        int $createDate
    ) {
        $this->setAddressCount($addressCount);
        $this->setPendingReceived($pendingReceived);
        $this->setStatus($status);
        $this->setServiceFee($serviceFee);
        $this->setPaid($paid);
        $this->setSuccessCallbacks($successCallbacks);
        $this->setFailedCallbacks($failedCallbacks);
        $this->setTransactionCount($transactionCount);
        $this->setDomain($domain);
        $this->setPendingTransactionCount($pendingTransactionCount);
        $this->setInvalidTransactionCount($invalidTransactionCount);
        $this->setFeePaid($feePaid);
        $this->setPendingPaid($pendingPaid);
        $this->setReceived($received);
        $this->setCreateDate($createDate);
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
    public function getPendingReceived(): int
    {
        return $this->pendingReceived;
    }

    /**
     * @param int $value
     */
    public function setPendingReceived(int $value)
    {
        $this->pendingReceived = $value;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $value
     */
    public function setStatus(string $value)
    {
        $this->status = $value;
    }

    /**
     * @return int
     */
    public function getServiceFee(): int
    {
        return $this->serviceFee;
    }

    /**
     * @param int $value
     */
    public function setServiceFee(int $value)
    {
        $this->serviceFee = $value;
    }

    /**
     * @return int
     */
    public function getPaid(): int
    {
        return $this->paid;
    }

    /**
     * @param int $value
     */
    public function setPaid(int $value)
    {
        $this->paid = $value;
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
    public function getTransactionCount(): int
    {
        return $this->transactionCount;
    }

    /**
     * @param int $value
     */
    public function setTransactionCount(int $value)
    {
        $this->transactionCount = $value;
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * @param string $value
     */
    public function setDomain(string $value)
    {
        $this->domain = $value;
    }

    /**
     * @return int
     */
    public function getPendingTransactionCount(): int
    {
        return $this->pendingTransactionCount;
    }

    /**
     * @param int $value
     */
    public function setPendingTransactionCount(int $value)
    {
        $this->pendingTransactionCount = $value;
    }

    /**
     * @return int
     */
    public function getInvalidTransactionCount(): int
    {
        return $this->invalidTransactionCount;
    }

    /**
     * @param int $value
     */
    public function setInvalidTransactionCount(int $value)
    {
        $this->invalidTransactionCount = $value;
    }

    /**
     * @return int
     */
    public function getFeePaid(): int
    {
        return $this->feePaid;
    }

    /**
     * @param int $value
     */
    public function setFeePaid(int $value)
    {
        $this->feePaid = $value;
    }

    /**
     * @return int
     */
    public function getPendingPaid(): int
    {
        return $this->pendingPaid;
    }

    /**
     * @param int $value
     */
    public function setPendingPaid(int $value)
    {
        $this->pendingPaid = $value;
    }

    /**
     * @return int
     */
    public function getReceived(): int
    {
        return $this->received;
    }

    /**
     * @param int $value
     */
    public function setReceived(int $value)
    {
        $this->received = $value;
    }

    /**
     * @return int
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
}

