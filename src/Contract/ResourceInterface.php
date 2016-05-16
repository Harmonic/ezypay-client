<?php

/**
 * Interface resourceInterface
 *
 * Base Resource interface
 */
interface ResourceInterface extends \Ezypay\Contract\IResource
{
    /**
     * resourceInterface constructor.
     *
     * @param DriverInterface $driverInterface connector
     */
    public function __construct(DriverInterface $driverInterface, \Ezypay\Validation\ValidationBase $validation);


}

?>