<?php

interface resourceInterfaceInvoice extends resourceInterface{
    public function getNext($customerId,$subscriptionId);
    public function refund($id);
    public function markAsPaid($id);
    public function delete($id);
}

?>