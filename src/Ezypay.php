<?php
/**
 * Created by PhpStorm.
 * User: peroperje
 * Date: 21.4.16.
 * Time: 09.49
 */

namespace Ezypay;

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
     * @param $driver \driverInterface
     *
     * @return \resourceInterface
     */
    public static function resource($name, \driverInterface $driver, ValidationBase $validationBase)
    {
        if (class_exists('Ezypay\\Resource\\'.$name,false))
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
     * @return \driverInterface
     */
    public static function driver($name,array $data)
    {
        if (class_exists('Ezypay\\Driver\\'.$name,false))
        {
            $class = 'Ezypay\\Driver\\'.$name;
            return new $class($data);
        }
    }
}