<?php

namespace PostMix\LaravelBitaps\Entities;

class WalletTransaction
{
    /**
     * Types of the transactions
     */
    const TRANSACTION_TYPES = [
        'transactions',
        'pending_transactions',
    ];

    /**
     * Count of sent transactions before the current transaction
     *
     * @var int
     */
    private $timelineSentCount;

    /**
     * Date of confirmation of the transaction in the format UNIX timestamp
     *
     * @var int
     */
    private $timestamp;

    /**
     * Block number in the blockchain in which this transaction is included
     *
     * @var int
     */
    private $blockHeight;

    /**
     * Creation date of the transaction in the UNIX timestamp format
     *
     * @var int
     */
    private $createTimestamp;

    /**
     * Count of transactions received before the current transaction
     *
     * @var int
     */
    private $timelineReceivedCount;

    /**
     * Transaction amount
     *
     * @var int
     */
    private $amount;

    /**
     * Transaction hash
     *
     * @var string
     */
    private $hash;

    /**
     * Wallet balance to current transaction
     *
     * @var int
     */
    private $timelineBalance;

    /**
     * Out number
     *
     * @var int
     */
    private $out;

    /**
     * Service fee
     *
     * @var int
     */
    private $fee;

    /**
     * @var string
     */
    private $type;

    /**
     * Number of invalid transaction before current transaction
     *
     * @var int
     */
    private $timelineInvalidCount;

    /**
     * Receiver address
     *
     * @var string
     */
    private $address;

    /**
     * Transaction confirmation time in format ISO UTC 0
     *
     * @var string
     */
    private $time;

    /**
     * WalletTransaction constructor.
     *
     * @param int $timelineSentCount
     * @param int $timestamp
     * @param int $blockHeight
     * @param int $createTimestamp
     * @param int $timelineReceivedCount
     * @param int $amount
     * @param string $hash
     * @param int $timelineBalance
     * @param int $out
     * @param int $fee
     * @param string $type
     * @param int $timelineInvalidCount
     * @param string $address
     * @param string $time
     */
    public function __construct(
        int $timelineSentCount,
        int $timestamp,
        int $blockHeight,
        int $createTimestamp,
        int $timelineReceivedCount,
        int $amount,
        string $hash,
        int $timelineBalance,
        int $out,
        int $fee,
        string $type,
        int $timelineInvalidCount,
        string $address,
        string $time
    ) {
        $this->setTimelineSentCount($timelineSentCount);
        $this->setTimestamp($timestamp);
        $this->setBlockHeight($blockHeight);
        $this->setCreateTimestamp($createTimestamp);
        $this->setTimelineReceivedCount($timelineReceivedCount);
        $this->setAmount($amount);
        $this->setHash($hash);
        $this->setTimelineBalance($timelineBalance);
        $this->setOut($out);
        $this->setFee($fee);
        $this->setType($type);
        $this->setTimelineInvalidCount($timelineInvalidCount);
        $this->setAddress($address);
        $this->setTime($time);
    }

    /**
     * @return int
     */
    public function getTimelineSentCount(): int
    {
        return $this->timelineSentCount;
    }

    /**
     * @param int $value
     */
    public function setTimelineSentCount(int $value)
    {
        $this->timelineSentCount = $value;
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
     * @return int
     */
    public function getBlockHeight(): int
    {
        return $this->blockHeight;
    }

    /**
     * @param int $value
     */
    public function setBlockHeight(int $value)
    {
        $this->blockHeight = $value;
    }

    /**
     * @return int
     */
    public function getCreateTimestamp(): int
    {
        return $this->createTimestamp;
    }

    /**
     * @param int $value
     */
    public function setCreateTimestamp(int $value)
    {
        $this->createTimestamp = $value;
    }

    /**
     * @return int
     */
    public function getTimelineReceivedCount(): int
    {
        return $this->timelineReceivedCount;
    }

    /**
     * @param int $value
     */
    public function setTimelineReceivedCount(int $value)
    {
        $this->timelineReceivedCount = $value;
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

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $value
     */
    public function setHash(string $value)
    {
        $this->hash = $value;
    }

    /**
     * @return int
     */
    public function getTimelineBalance(): int
    {
        return $this->timelineBalance;
    }

    /**
     * @param int $value
     */
    public function setTimelineBalance(int $value)
    {
        $this->timelineBalance = $value;
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
    public function getFee(): int
    {
        return $this->fee;
    }

    /**
     * @param int $value
     */
    public function setFee(int $value)
    {
        $this->fee = $value;
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
    public function getTimelineInvalidCount(): int
    {
        return $this->timelineInvalidCount;
    }

    /**
     * @param int $value
     */
    public function setTimelineInvalidCount(int $value)
    {
        $this->timelineInvalidCount = $value;
    }

    /**
     * @return int
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
}
