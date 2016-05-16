<?php

namespace Ezypay\Resource;


use driverInterface;
use Ezypay\Result\ResultProducer;
use Ezypay\Validation\ValidationBase;


/**
 * Class Subscription
 * @package Ezypay\Resource
 */
class Subscription extends Resurce implements \resourceInterfaceSubscription, \resourceInterfaceCreate, \resourceInterfaceUpdate
{
    /**
     * @var string defautl object name
     */
    private $resourceType = 'Subscription';

    /**
     * Subscription constructor.
     * @param driverInterface $connector
     * @param $validation ValidationBase
     */
    public function __construct(\driverInterface $connector, ValidationBase $validation)
    {
        parent::__construct($connector,$validation,$this->resourceType);
    }

    /**
     * Retrieves the list of subscription of an existing customer.
     *
     * @link https://demoapi.ezypay.com/help/docs#!/Subscriptions/SubscriptionsApi_GetSubscriptionList
     * @param array $data
     * @return ResultProducer
     */
    public function findAll(array $data = array())
    {
        $this->settings(array(
            'url' => !empty($data) ? 'subscriptions?' . http_build_query($data) : 'subscriptions',
            'method' => 'GET'
        ));

        return $this->result();
    }

    /**
     * Retrieves the particular subscription details of an existing customer with the given subscriptionId.
     *
     * @link https://demoapi.ezypay.com/help/docs#!/Subscriptions/SubscriptionsApi_GetSubscription
     * @param $id string The ID of the subscription.
     * @return ResultProducer
     */
    public function findById($id)
    {
        $this->settings(array(
            'url' => 'subscriptions/' . $id,
            'method' => 'GET'
        ));

        return $this->result();
    }

    /**
     * Creates a new subscription for an existing customer.
     *
     * @link https://demoapi.ezypay.com/help/docs#!/Subscriptions/SubscriptionsApi_CreateSubscription
     * @param array $data The Subscription data. Refer to Request Body Schema (see link).
     * @return ResultProducer
     */
    public function create(array $data)
    {
        $this->settings(array(
            'url' => 'subscriptions',
            'method' => 'POST',
            'data' => $data
        ));

        return $this->result();
    }

    /**
     * Preview a subscription.
     *
     * @link https://demoapi.ezypay.com/help/docs#!/Subscriptions/SubscriptionsApi_PreviewSubscription
     * @param array $data The Subscription data. Refer to Request Body Schema (see link).
     * @return ResultProducer
     */
    public function preview(array $data)
    {
        $this->settings(array(
            'url' => 'subscriptions/preview',
            'method' => 'POST',
            'data' => $data
        ));
        $this->setResourceType('SubscriptionPreview');
        return $this->result();
        //$this->setResourceType($this->resourceType);
        //return $res;
    }

    /**
     * You can cancel a customer's subscription and remove all future billing related to the subscription. However, all payment that was failed previously would not be removed and to be resolved separately.
     *
     * @link https://demoapi.ezypay.com/help/docs#!/Subscriptions/SubscriptionsApi_CancelSubscription
     * @param $id string The ID of the subscription.
     * @return ResultProducer
     */
    public function cancel($id)
    {
        $this->settings(array(
            'url' => 'subscriptions/' . $id . '/cancel',
            'method' => 'PUT'
        ));

        return $this->result();
    }

    /**
     * You can change a subscription payment method already on your payment account. It will turn subscription status to active if inactive status is found.
     *
     * @link https://demoapi.ezypay.com/help/docs#!/Subscriptions/SubscriptionsApi_UpdateSubscriptionPaymentMethod
     * @param $id string subscription ID
     * @param array $data
     * @return ResultProducer
     */
    public function update($id, array $data)
    {
        $this->settings(array(
            'url' => 'subscriptions/' . $id . '/paymentmethod/' . $data['paymentmethodId'],
            'method' => 'PUT'
        ));
        $this->setResourceType('PaymentMethod');
        return $this->result();
    }


}