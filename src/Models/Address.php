<?php

namespace PostMix\LaravelBitaps\Models;

class Address
{
    /**
     * Payment code, used to authenticate payment notifications and receive
     * statistics to the address (this code should not be disclosed for
     * security reasons)
     *
     * @var string
     */
    private $paymentCode;

    /**
     * Link for payment notification handler
     *
     * @var string
     */
    private $callbackLink;

    /**
     * Address for payout
     *
     * @var string
     */
    private $forwardingAddress;

    /**
     * The unique identifier for the domain of the callback handler.
     *
     * @var string
     */
    private $domainHash;

    /**
     * Number of confirmations required for the payment
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
     * Domain derived from the payment notification link
     *
     * @var string
     */
    private $domain;

    /**
     * Public payment address identificator
     *
     * @var string
     */
    private $invoice;

    /**
     * Currency
     *
     * @var string
     */
    private $currency;

    /**
     * Address constructor.
     *
     * @param string $paymentCode
     * @param string $callbackLink
     * @param string $forwardingAddress
     * @param string $domainHash
     * @param int $confirmations
     * @param string $address
     * @param string $legacyAddress
     * @param string $domain
     * @param string $invoice
     * @param string $currency
     */
    public function __construct(
        string $paymentCode,
        string $callbackLink,
        string $forwardingAddress,
        string $domainHash,
        int $confirmations,
        string $address,
        string $legacyAddress,
        string $domain,
        string $invoice,
        string $currency
    ) {
        $this->setPaymentCode($paymentCode);
        $this->setCallbackLink($callbackLink);
        $this->setForwardingAddress($forwardingAddress);
        $this->setDomainHash($domainHash);
        $this->setConfirmations($confirmations);
        $this->setAddress($address);
        $this->setLegacyAddress($legacyAddress);
        $this->setDomain($domain);
        $this->setInvoice($invoice);
        $this->setCurrency($currency);
    }

    /**
     * @return string
     */
    public function getPaymentCode(): string
    {
        return $this->paymentCode;
    }

    /**
     * @param string $value
     */
    public function setPaymentCode(string $value)
    {
        $this->paymentCode = $value;
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
     * @return string
     */
    public function getForwardingAddress(): string
    {
        return $this->forwardingAddress;
    }

    /**
     * @param string $value
     */
    public function setForwardingAddress(string $value)
    {
        $this->forwardingAddress = $value;
    }

    /**
     * @return string
     */
    public function getDomainHash(): string
    {
        return $this->domainHash;
    }

    /**
     * @param string $value
     */
    public function setDomainHash(string $value)
    {
        $this->domainHash = $value;
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
     * @return string
     */
    public function getInvoice(): string
    {
        return $this->invoice;
    }

    /**
     * @param string $value
     */
    public function setInvoice(string $value)
    {
        $this->invoice = $value;
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
}
