<?php

namespace PostMix\LaravelBitaps\Entities;

class CallbackResponse
{
    /**
     * HTTP status
     *
     * @var string
     */
    private $requestStatus;

    /**
     * @var RequestIpLog
     */
    private $requestIpLog;

    /**
     * Response string
     *
     * @var string
     */
    private $requestResponse;

    /**
     * Notification status
     *
     * @var string
     */
    private $requestSuccess;

    /**
     * Notification id
     *
     * @var string
     */
    private $requestId;

    /**
     * Notification error
     *
     * @var string
     */
    private $requestError;

    /**
     * CallbackResponse constructor.
     *
     * @param int $requestStatus
     * @param RequestIpLog $requestIpLog
     * @param string $requestResponse
     * @param bool $requestSuccess
     * @param int $requestId
     * @param string $requestError
     */
    public function __construct(
        int $requestStatus,
        RequestIpLog $requestIpLog,
        string $requestResponse,
        bool $requestSuccess,
        int $requestId,
        string $requestError
    ) {
        $this->setRequestStatus($requestStatus);
        $this->setRequestIpLog($requestIpLog);
        $this->setRequestResponse($requestResponse);
        $this->setRequestSuccess($requestSuccess);
        $this->setRequestId($requestId);
        $this->setRequestError($requestError);
    }

    /**
     * @return int
     */
    public function getRequestStatus(): int
    {
        return $this->requestStatus;
    }

    /**
     * @param int $value
     */
    public function setRequestStatus(int $value)
    {
        $this->requestStatus = $value;
    }

    /**
     * @return RequestIpLog
     */
    public function getRequestIpLog(): RequestIpLog
    {
        return $this->requestIpLog;
    }

    /**
     * @param RequestIpLog $value
     */
    public function setRequestIpLog(RequestIpLog $value)
    {
        $this->requestIpLog = $value;
    }

    /**
     * @return string
     */
    public function getRequestResponse(): string
    {
        return $this->requestResponse;
    }

    /**
     * @param string $value
     */
    public function setRequestResponse(string $value)
    {
        $this->requestResponse = $value;
    }

    /**
     * @return bool
     */
    public function getRequestSuccess(): bool
    {
        return $this->requestSuccess;
    }

    /**
     * @param bool $value
     */
    public function setRequestSuccess(bool $value)
    {
        $this->requestSuccess = $value;
    }

    /**
     * @return int
     */
    public function getRequestId(): int
    {
        return $this->requestId;
    }

    /**
     * @param int $value
     */
    public function setRequestId(int $value)
    {
        $this->requestId = $value;
    }

    /**
     * @return string
     */
    public function getRequestError(): string
    {
        return $this->requestError;
    }

    /**
     * @param string $value
     */
    public function setRequestError(string $value)
    {
        $this->requestError = $value;
    }
}
