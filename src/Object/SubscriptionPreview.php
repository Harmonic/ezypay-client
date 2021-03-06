<?php

namespace Ezypay\Object;

/**
 * Class SubscriptionPreview
 *
 * @package Ezypay\Object
 */
class SubscriptionPreview
{
    /**
     * @var $planId string The ID of the plan.
     */
    private $planId;
    /**
     * @var $subscriptionName string Subscription's name.
     */
    private $subscriptionName;
    /**
     * @var $status string Subscription's status.
     */
    private $status;
    /**
     * @var $subscriptionStartDate string Subscription's start date.
     */
    private $subscriptionStartDate;
    /**
     * @var $subscriptionEndDate string Subscription's end date.
     */
    private $subscriptionEndDate;
    /**
     * @var $nextBillingDate string Subscription's next billing date.
     */
    private $nextBillingDate;
    /**
     * @var $nextBillingAmount number Subscription's next amount.
     */
    private $nextBillingAmount;
    /**
     * @var $totalUpToDatePaymentCollection number Subscription's total up to date collection.
     */
    private $totalUpToDatePaymentCollection;
    /**
     * @var $totalUpToDateBillingCycles integer Subscription's total up date billing cycles.
     */
    private $totalUpToDateBillingCycles;
    /**
     * @var $remainingPaymentCollection number Subscription's remaining collection.
     */
    private $remainingPaymentCollection;
    /**
     * @var $remainingBillingCycles integer Subscription's remaining billing cycles.
     */
    private $remainingBillingCycles;
    /**
     * @var $schedules array [SubscriptionScheduleResult]Subscription's list of schedules.
     */
    private $schedules;
    /**
     * @var $createdOn string Date record is created.
     */
    private $createdOn;

    /**
     * SubscriptionPreview constructor.
     * @param $data array
     */
    function __construct($data)
    {
        foreach ( $data as $key => $value ){
            $this->$key = $value;
        }
    }

}