<?php

interface resourceInterfaceSubscription extends resourceInterface
{
    public function preview(array $data);
    public function cancel($id);
}
?>