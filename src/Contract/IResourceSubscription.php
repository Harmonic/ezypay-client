<?php
/**
 * Created by PhpStorm.
 * User: peroperje
 * Date: 16.5.16.
 * Time: 09.23
 */
namespace Ezypay\Contract;

interface IResourceSubscription extends IResource
{
    public function preview(array $data);

    public function cancel($id);
}