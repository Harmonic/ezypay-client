<?php

/**
 * Interface resourceInterface
 */
interface resourceInterfaceSettlement extends \Ezypay\Contract\IResourceSettlement
{
    public function __construct(DriverInterface $driverInterface, \Ezypay\Validation\ValidationBase $validation);

  //  public function findById($id);

}
?>