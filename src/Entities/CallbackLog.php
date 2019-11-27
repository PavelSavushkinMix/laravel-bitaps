<?php

namespace PostMix\LaravelBitaps\Entities;

class CallbackLog
{

    /**
     * @var array
     */
    private $status;

    /**
     * @var CallbackResponse
     */
    private $callbackResponse;

    /**
     * @var string
     */
    private $time;

    /**
     * @var int
     */
    private $timestamp;

    /**
     * @var string
     */
    private $event;

    /**
     * @var int
     */
    private $confirmations;

    /**
     * @var string
     */
    private $outpount;

    /**
     * @var string
     */
    private $responseStatus;

    /**
     * @var int
     */
    private $amount;

    /**
     * CallbackAddressLog constructor.
     *
     * @param array $status
     * @param CallbackResponse $callbackResponse
     * @param string $time
     * @param int $timestamp
     * @param string $event
     * @param int $confirmations
     * @param string $outpount
     * @param string $responseStatus
     * @param int $amount
     */
    public function __construct(
        array $status,
        CallbackResponse $callbackResponse,
        string $time,
        int $timestamp,
        string $event,
        int $confirmations,
        string $outpount,
        string $responseStatus,
        int $amount
    ) {
        $this->setStatus($status);
        $this->setCallbackResponse($callbackResponse);
        $this->setTime($time);
        $this->setTimestamp($timestamp);
        $this->setEvent($event);
        $this->setConfirmations($confirmations);
        $this->setOutpount($outpount);
        $this->setResponseStatus($responseStatus);
        $this->setAmount($amount);
    }

    /**
     * @return array
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
     * @return CallbackResponse
     */
    public function getCallbackResponse(): CallbackResponse
    {
        return $this->callbackResponse;
    }

    /**
     * @param CallbackResponse $value
     */
    public function setCallbackResponse(CallbackResponse $value)
    {
        $this->callbackResponse = $value;
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
    public function getEvent(): string
    {
        return $this->event;
    }

    /**
     * @param string $value
     */
    public function setEvent(string $value)
    {
        $this->event = $value;
    }

    /**
     * @return int
     */
    public function getConfirmations(): int
    {
        return $this->confirmations;
    }

    /**
     * @param int $value
     */
    public function setConfirmations(int $value)
    {
        $this->confirmations = $value;
    }

    /**
     * @return string
     */
    public function getOutpount(): string
    {
        return $this->outpount;
    }

    /**
     * @param string $value
     */
    public function setOutpount(string $value)
    {
        $this->outpount = $value;
    }

    /**
     * @return string
     */
    public function getResponseStatus(): string
    {
        return $this->responseStatus;
    }

    /**
     * @param string $value
     */
    public function setResponseStatus(string $value)
    {
        $this->responseStatus = $value;
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
