<?php


namespace PostMix\LaravelBitaps\Models;


class AddressState
{
    /**
     * Link for payment notification handler
     *
     * @var string
     */
    private $callbackLink;

    /**
     * Amount of pending payments
     *
     * @var int
     */
    private $pendingReceived;

    /**
     * Total number of fee paid for this address
     *
     * @var int
     */
    private $feePaid;

    /**
     * Address date of creation
     *
     * @var int
     */
    private $createDate;

    /**
     * Invalid transaction count
     *
     * @var int
     */
    private $invalidTransactionCount;

    /**
     * Payout amount
     *
     * @var int
     */
    private $paid;

    /**
     * Total amount of payments received
     *
     * @var int
     */
    private $received;

    /**
     * Address for payout
     *
     * @var string
     */
    private $forwardingAddress;

    /**
     * The number of confirmations required to confirm the payment
     *
     * @var int
     */
    private $confirmations;

    /**
     * Payment address
     *
     * @var string
     */
    private $address;

    /**
     * Payment address in outdated format
     *
     * @var string
     */
    private $legacyAddress;

    /**
     * Type of payment address
     *
     * @var string
     */
    private $type;

    /**
     * The number of transactions received
     *
     * @var int
     */
    private $transactionCount;

    /**
     * Pending payout amount
     *
     * @var int
     */
    private $pendingPaid;

    /**
     * Pending payout count
     *
     * @var int
     */
    private $pendingTransactionCount;

    /**
     * Address currency
     *
     * @var string
     */
    private $currency;

    /**
     * Address date of creation in unix timestamp format
     *
     * @var int
     */
    private $createDateTimestamp;

    /**
     * AddressState constructor.
     *
     * @param string $callbackLink
     * @param int $pendingReceived
     * @param int $feePaid
     * @param int $createDate
     * @param int $invalidTransactionCount
     * @param int $paid
     * @param int $received
     * @param string $forwardingAddress
     * @param int $confirmations
     * @param string $address
     * @param string $legacyAddress
     * @param string $type
     * @param int $transactionCount
     * @param int $pendingPaid
     * @param int $pendingTransactionCount
     * @param string $currency
     * @param int $createDateTimestamp
     */
    public function __construct(
        string $callbackLink,
        int $pendingReceived,
        int $feePaid,
        int $createDate,
        int $invalidTransactionCount,
        int $paid,
        int $received,
        string $forwardingAddress,
        int $confirmations,
        string $address,
        string $legacyAddress,
        string $type,
        int $transactionCount,
        int $pendingPaid,
        int $pendingTransactionCount,
        string $currency,
        int $createDateTimestamp
    ) {
        $this->setCallbackLink($callbackLink);
        $this->setPendingReceived($pendingReceived);
        $this->setFeePaid($feePaid);
        $this->setCreateDate($createDate);
        $this->setInvalidTransactionCount($invalidTransactionCount);
        $this->setPaid($paid);
        $this->setReceived($received);
        $this->setForwardingAddress($forwardingAddress);
        $this->setConfirmations($confirmations);
        $this->setAddress($address);
        $this->setLegacyAddress($legacyAddress);
        $this->setType($type);
        $this->setTransactionCount($transactionCount);
        $this->setPendingPaid($pendingPaid);
        $this->setPendingTransactionCount($pendingTransactionCount);
        $this->setCurrency($currency);
        $this->setCreateDateTimestamp($createDateTimestamp);
    }

    /**
     * @return string
     */
    public function getCallbackLink(): string
    {
        return $this->callbackLink;
    }

    /**
     * @param string $value
     */
    public function setCallbackLink(string $value)
    {
        $this->callbackLink = $value;
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
     * @return string
     */
    public function getForwardingAddress(): string
    {
        return $this->forwardingAddress;
    }

    /**
     * @param int $value
     */
    public function setForwardingAddress(int $value)
    {
        $this->forwardingAddress = $value;
    }

    /**
     * @return int
     */
    public function getConfirmations(): int
    {
        return $this->confirmations;
    }

    /**
     * @param string $value
     */
    public function setConfirmations(string $value)
    {
        $this->confirmations = $value;
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
    public function getLegacyAddress(): string
    {
        return $this->legacyAddress;
    }

    /**
     * @param string $value
     */
    public function setLegacyAddress(string $value)
    {
        $this->legacyAddress = $value;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $value
     */
    public function setType(string $value)
    {
        $this->type = $value;
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
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $value
     */
    public function setCurrency(string $value)
    {
        $this->currency = $value;
    }

    /**
     * @return int
     */
    public function getCreateDateTimestamp(): int
    {
        return $this->createDateTimestamp;
    }

    /**
     * @param int $value
     */
    public function setCreateDateTimestamp(int $value)
    {
        $this->createDateTimestamp = $value;
    }
}
