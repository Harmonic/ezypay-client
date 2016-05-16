<?php

/**
 * Interface resourceInterface
 *
 * Base Resource interface
 */
interface resourceInterface
{
    /**
     * resourceInterface constructor.
     *
     * @param driverInterface $driverInterface connector
     */
    public function __construct(driverInterface $driverInterface,\Ezypay\Validation\ValidationBase $validation);

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

?>