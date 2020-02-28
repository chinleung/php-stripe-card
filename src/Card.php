<?php

namespace ChinLeung\Stripe;

class Card
{
    /**
     * The number of the card.
     *
     * @var string
     */
    protected $number;

    /**
     * The expiry date of the card.
     *
     * @var string
     */
    protected $expiry;

    /**
     * The security code of the card.
     *
     * @var string
     */
    protected $code;

    /**
     * The token of the card.
     *
     * @var string
     */
    protected $token;

    /**
     * The payment method token of the card.
     *
     * @var string
     */
    protected $paymentMethod;

    /**
     * The brand of the card.
     *
     * @var string
     */
    protected $brand;

    /**
     * Instantiate a new card where charges are declined with card_declined
     * code.
     *
     * @return \ChinLeung\Card
     */
    public static function chargeDeclined(): Card
    {
        return (new static)->setNumber('4000000000000002')
            ->setBrand('Visa')
            ->setToken('tok_chargeDeclined')
            ->setPaymentMethod('pm_card_chargeDeclined')
        ;
    }

    /**
     * Instantiate a new Mastercard card.
     *
     * @return \ChinLeung\Card
     */
    public static function mastercard(): Card
    {
        return (new static)->setNumber('5555555555554444')
            ->setBrand('Mastercard')
            ->setToken('tok_mastercard')
            ->setPaymentMethod('pm_card_mastercard')
        ;
    }

    /**
     * Instantiate a new Mastercard (2-series) card.
     *
     * @return \ChinLeung\Card
     */
    public static function mastercard2Series(): Card
    {
        return (new static)->setNumber('2223003122003222')
            ->setBrand('Mastercard (2-series)')
            ->setToken('tok_mastercard')
            ->setPaymentMethod('pm_card_mastercard')
        ;
    }

    /**
     * Instantiate a new Mastercard (debit) card.
     *
     * @return \ChinLeung\Card
     */
    public static function mastercardDebit(): Card
    {
        return (new static)->setNumber('5200828282828210')
            ->setBrand('Mastercard (debit)')
            ->setToken('tok_mastercard_debit')
            ->setPaymentMethod('pm_card_mastercard_debit')
        ;
    }

    /**
     * Instantiate a new Visa card.
     *
     * @return \ChinLeung\Card
     */
    public static function visa(): Card
    {
        return (new static)->setNumber('4242424242424242')
            ->setBrand('Visa')
            ->setToken('tok_visa')
            ->setPaymentMethod('pm_card_visa')
        ;
    }

    /**
     * Instantiate a new Visa debit card.
     *
     * @return \ChinLeung\Card
     */
    public static function visaDebit(): Card
    {
        return (new static)->setNumber('4000056655665556')
            ->setBrand('Visa (debit)')
            ->setToken('tok_visa_debit')
            ->setPaymentMethod('pm_card_visa_debit')
        ;
    }


    /**
     * Retrieve the brand of the card.
     *
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * Same as getSecurityCode.
     *
     * @return string
     */
    public function getCvcCode(): string
    {
        return $this->getSecurityCode();
    }

    /**
     * Retrieve the expiration date of the card. Generate an expiration
     * date if none has been set.
     *
     * @return string
     */
    public function getExpiryDate(): string
    {
        if (is_null($this->expiry)) {
            $this->expiry = date('my', strtotime('next year'));
        }

        return $this->expiry;
    }

    /**
     * Retrieve the last four digits of the card.
     *
     * @return string
     */
    public function getLastFour(): string
    {
        return substr($this->number, -4);
    }

    /**
     * Retrieve the number of the card.
     *
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * Retrieve the payment method token of the card.
     *
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    /**
     * Retrieve the security code of the card. Generate a random one if no
     * code is set to the card.
     *
     * @return string
     */
    public function getSecurityCode(): string
    {
        if (is_null($this->code)) {
            $this->code = mt_rand(100, 999);
        }

        return $this->code;
    }

    /**
     * Retrieve the token of the card.
     *
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * Set the brand of the card.
     *
     * @param  string  $brand
     * @return \ChinLeung\Card
     */
    public function setBrand(string $brand): Card
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Same as setSecurityCode.
     *
     * @param  string  $code
     * @return \ChinLeung\Card
     */
    public function setCvcCode(string $code): Card
    {
        return $this->setSecurityCode($code);
    }

    /**
     * Set the expiration date of the card.
     *
     * @param  string  $expiry
     * @return \ChinLeung\Card
     */
    public function setExpiryDate(string $expiry): Card
    {
        $this->expiry = $expiry;

        return $this;
    }

    /**
     * Set the number of the card.
     *
     * @param  string  $number
     * @return \ChinLeung\Card
     */
    public function setNumber(string $number): Card
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Set the payment method token of the card.
     *
     * @param  string  $paymentMethod
     * @return \ChinLeung\Card
     */
    public function setPaymentMethod(string $paymentMethod): Card
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * Set the security code of the card.
     *
     * @param  string  $code
     * @return \ChinLeung\Card
     */
    public function setSecurityCode(string $code): Card
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Set the token of the card.
     *
     * @param  string  $token
     * @return \ChinLeung\Card
     */
    public function setToken(string $token): Card
    {
        $this->token = $token;

        return $this;
    }
}
