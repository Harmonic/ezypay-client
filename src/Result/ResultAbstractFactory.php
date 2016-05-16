<?php

namespace Ezypay\Result;

/**
 * Class ResultAbstractFactory
 *
 * @package Ezypay\Result
 */
abstract class ResultAbstractFactory
{
    /**
     * Run method
     *
     * @return mixed
     */
    abstract function run();

    protected $res;

    protected $err;
    /**
     * @var string $resourceType resource name
     */
    protected $resourceType;

    /**
     * ResultAbstractFactory constructor.
     *
     * @param \DriverInterface $connector
     * @param $resourceType string
     */
    public function __construct($res,$err,$resourceType)
    {
        $this->res = $res;
        $this->err = $err;
        $this->resourceType = $resourceType;
    }
}