<?php

namespace Ezypay\Contract;


/**
 * Interface resourceInterface
 *
 * Base Resource interface
 */
interface IResource
{
    /**
     * Set connector data to fetch collection of resource
     *
     * @param array $data
     * @return \Ezypay\Result\ResultProducer
     */
    public function findAll(array $data);

    /**
     * Set connector data to fetch single resource by ID
     *
     * @param $id string
     * @return \Ezypay\Result\ResultProducer
     */
    public function findById($id);
}