<?php

namespace Ezypay\Contract;
use Ezypay\Result\ResultProducer;


/**
 * Interface IResource
 *
 * @package Ezypay\Contract
 */
interface IResource
{
    /**
     * Set connector data to fetch collection of resource
     * 
     * @param array $data
     * @return ResultProducer
     */
    public function findAll(array $data);

    /**
     * Set connector data to fetch single resource by ID
     *
     * @param $id string
     * @return ResultProducer
     */
    public function findById($id);
}