<?php
/**
 * Created by PhpStorm.
 * User: peroperje
 * Date: 16.5.16.
 * Time: 09.21
 */
namespace Ezypay\Contract;

interface IResourcePlan extends IResource
{
    public function deactivate($id);
}