<?php

namespace PostMix\LaravelBitaps\Entities;

class RequestIpLog
{
    /**
     * IP from which the notification was sent
     *
     * @var string
     */
    private $ip;

    /**
     * Status
     *
     * @var int
     */
    private $status;

    /**
     * Request time in milliseconds
     *
     * @var int
     */
    private $time;

    /**
     * RequestIpLog constructor.
     *
     * @param string $ip
     * @param int $status
     * @param int $time
     */
    public function __construct(
        string $ip,
        int $status,
        int $time
    ) {
        $this->setIp($ip);
        $this->setStatus($status);
        $this->setTime($time);
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @param string $value
     */
    public function setIp(string $value)
    {
        $this->ip = $value;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $value
     */
    public function setStatus(int $value)
    {
        $this->status = $value;
    }

    /**
     * @return int
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * @param int $value
     */
    public function setTime(int $value)
    {
        $this->time = $value;
    }
}
