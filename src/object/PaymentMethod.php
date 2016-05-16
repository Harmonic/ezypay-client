<?php

namespace Ezypay\Object;

/**
 * Class PaymentMethod
 *
 * @package Ezypay\Object
 */
class PaymentMethod
{
    /**
     * @var $paymentMethodId string The ID of the payment method.
     */
    private $paymentMethodId;
    /**
     * @var $customerId string The ID of the customer.
     */
    private $customerId;
    /**
     * @var $type string The payment method type.
     */
    private $type;
    /**
     * @var $bankHolderName string The person's whose name is on the bank account.
     */
    private $bankHolderName;
    /**
     * @var $bankAccountNumberDisplay string The person's bank account number.
     */
    private $bankAccountNumberDisplay;
    /**
     * @var $bankNumber string The bank account's bank number.
     */
    private $bankNumber;
    /**
     * @var $branchNumber string The branch number of the bank's local division or branch.
     */
    private $branchNumber;
    /**
     * @var $suffixNumber string The bank account's suffix number is to show the type of account.
     */
    private $suffixNumber;
    /**
     * @var $last4 string The credit card last 4 digit number.
     */
    private $last4;
    /**
     * @var $cardHolderName string The person's whose name is on the credit card.
     */
    private $cardHolderName;
    /**
     * @var $cardIssuer string The credit card issuer number.
     */
    private $cardIssuer;
    /**
     * @var $expiryDate string The credit card expiry date.
     */
    private $expiryDate;
    /**
     * @var $status string The status of the payment account.
     */
    private $status;
    /**
     * @var $isDefault boolean Indicate whether the payment method is of default payment method.
     */
    private $isDefault;
    /**
     * @var $createdOn string Date record is created.
     */
    private $createdOn;

    /**
     * PaymentMethod constructor.
     *
     * @param $data array
     */
    function __construct($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

}