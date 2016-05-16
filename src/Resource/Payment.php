<?php

namespace Ezypay\Resource;

use Ezypay\Contract\IDriver;
use Ezypay\Contract\IResource;
use Ezypay\Result\ResultProducer;
use Ezypay\Validation\ValidationBase;

/**
 * Class Payment
 *
 * @package Ezypay\Resource
 */
class Payment extends Resurce implements IResource
{
    /**
     * @var string defautl object name
     */
    private $resourceType = 'Payment';

    /**
     * Payment constructor.
     * @param \DriverInterface $connector
     */
    public function __construct(IDriver $connector, ValidationBase $validation)
    {
        parent::__construct($connector, $validation, $this->resourceType);
    }

    /**
     * Get Payment List
     *
     * @link https://demoapi.ezypay.com/help/docs#!/Payments/PaymentsApi_GetPaymentList
     * @param array $data Parameters (see link)
     * @return ResultProducer
     */
    public function findAll(array $data = array())
    {
        $this->settings(array(
            'url' => !empty($data) ? 'payments?' . http_build_query($data) : 'payments',
            'method' => 'GET'
        ));

        return $this->result();
    }

    /**
     * Get Payment Details
     *
     * @link https://demoapi.ezypay.com/help/docs#!/Payments/PaymentsApi_GetPaymentDetails
     * @param $id string The running number of the payment.
     * @return ResultProducer
     */
    public function findById($id)
    {
        $this->settings(array(
            'url' => 'payments/' . $id,
            'method' => 'GET'
        ));

        return $this->result();
    }

}