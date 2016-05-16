<?php
/**
 * Created by PhpStorm.
 * User: peroperje
 * Date: 16.5.16.
 * Time: 09.17
 */
namespace Ezypay\Contract;

interface IResourceInvoice extends IResource
{
    public function getNext($customerId, $subscriptionId);

    public function refund($id);

    public function markAsPaid($id);

    public function delete($id);
}