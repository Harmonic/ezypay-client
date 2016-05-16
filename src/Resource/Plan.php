<?php

namespace Ezypay\Resource;

use Ezypay\Contract\DriverInterface;
use Ezypay\Contract\IResourceCreate;
use Ezypay\Contract\IResourcePlan;
use Ezypay\Contract\IResourceUpdate;
use Ezypay\Result\ResultProducer;
use Ezypay\Validation\ValidationBase;

/**
 * Class Plan
 *
 * Resource for plans
 *
 * @package Ezypay\Resource
 */
class Plan extends Resurce implements IResourcePlan, IResourceCreate, IResourceUpdate
{
    /**
     * @var string defautl object name
     */
    private $resourceType = 'Plan';


    /**
     * Plan constructor.
     *
     * @param \DriverInterface $connector
     * @param $validation ValidationBase
     */
    public function __construct(DriverInterface $connector, ValidationBase $validation)
    {
        parent::__construct($connector, $validation, $this->resourceType);
    }

    /**
     * Get list of available plan.
     *
     * @link https://demoapi.ezypay.com/help/docs#!/Plans/PlansApi_GetPlanList
     * @param array $data
     * @return ResultProducer
     */
    public function findAll(array $data = array())
    {
        $this->settings(array(
            'url' => !empty($data) ? 'plans?' . http_build_query($data) : 'plans',
            'method' => 'GET'
        ));
        return $this->result();
    }

    /**
     * Get an existing plan with a given planId.
     *
     * @link https://demoapi.ezypay.com/help/docs#!/Plans/PlansApi_GetPlan
     * @param $id
     * @return ResultProducer
     */
    public function findById($id)
    {
        $this->settings(array(
            'url' => 'plans/' . $id,
            'method' => 'GET',
        ));
        return $this->result();

    }

    /**
     * Creating a new plans can be done easily via the dashboard page. Alternatively, plans creation are available through API if creation of plans needs to be done on the fly.
     *
     * @link https://demoapi.ezypay.com/help/docs#!/Plans/PlansApi_CreatePlan
     * @param array $data The Plan data. Refer to Request Body Schema (see link).
     * @return ResultProducer
     */
    public function create(array $data)
    {
        $this->settings(array(
            'url' => 'plans',
            'method' => 'POST',
            'data' => $data
        ));
        return $this->result();
    }

    /**
     * Update the details of an existing plan, any subscriptions that are linked to the existing plans would not be affected by this change.
     *
     * @link https://demoapi.ezypay.com/help/docs#!/Plans/PlansApi_UpdatePlan
     * @param $id string The ID of the plan.
     * @param array $data The Plan data. Refer to Request Body Schema (see link)
     * @return ResultProducer
     */
    public function update($id, array $data)
    {
        $this->settings(array(
            'url' => 'plans/' . $id,
            'method' => 'PUT',
            'data' => $data
        ));

        return $this->result();
    }

    /**
     * Inactivate an existing plan. That that is marked as Inactive would disable it's use from Subscriptions and Online Signup.
     *
     * @link https://demoapi.ezypay.com/help/docs#!/Plans/PlansApi_DeactivatePlan
     * @param $id string The ID of the plan.
     * @return ResultProducer
     */
    public function deactivate($id)
    {
        $this->settings(array(
            'url' => 'plans/' . $id,
            'method' => 'DELETE'
        ));

        return $this->result();
    }
}