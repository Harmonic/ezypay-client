<?php


namespace Ezypay\Object;


use Ezypay\Ezypay;

/**
 * Class ObjectFactory
 *
 * @package Ezypay\Object
 */
class ObjectFactory
{
    /**
     * Object Factory
     *
     * Create object from provided data
     * 
     * @param $name string Class name
     * @param $data array array of the property values
     * @return mixed
     */
    public static function createObject($name, $data)
    {
        if (class_exists('Ezypay\\Object\\' . $name)) {
            $class = 'Ezypay\\Object\\' . $name;
            return new $class($data);
        }
    }
}