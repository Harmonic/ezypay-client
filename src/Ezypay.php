<?php
/**
 * Created by PhpStorm.
 * User: peroperje
 * Date: 21.4.16.
 * Time: 09.49
 */

namespace Ezypay;

use Ezypay\Contract\DriverInterface;
use Ezypay\Contract\IResource;
use Ezypay\Validation\ValidationBase;

/**
 * Class Ezypay
 * @package Ezypay
 */
class Ezypay
{
    /**
     * Resource
     *
     * Factory for resource
     *
     * @param $name string
     * @param $driver DriverInterface
     *
     * @return IResource
     */
    public static function resource($name, DriverInterface $driver, ValidationBase $validationBase)
    {
        if (class_exists('Ezypay\\Resource\\'.$name))
        {
            $class = 'Ezypay\\Resource\\'.$name;
            return new $class($driver,$validationBase);
        }
    }

    /**
     * Driver
     *
     * Factory for driver
     *
     * @param $name string
     * @param $data array settings
     * @return DriverInterface
     */
    public static function driver($name,array $data)
    {
        if (class_exists('Ezypay\Driver\\'.$name))
        {
            $class ='Ezypay\Driver\\'.$name;
            return new $class($data);
        }
    }
}