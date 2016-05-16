<?php

/**
 * Interface resourceInterface
 */
interface resourceInterfaceSettlement
{
    public function __construct(driverInterface $driverInterface, \Ezypay\Validation\ValidationBase $validation);

  //  public function findById($id);
    public function latest($merchantId);
    public  function findAll(array $data);
    public function getRevenue($merchantId,$settlementId);
    public function getDeduction($merchantId,$settlementId);
    
}
?>