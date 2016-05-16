<?php
/**
 * Created by PhpStorm.
 * User: peroperje
 * Date: 3.5.16.
 * Time: 09.34
 */

namespace Ezypay\Result;


use Ezypay;

class ResultError implements \resultInterfaceError
{
    /**
     * @var bool $isSuccess
     */
    private $isSuccess = false;
    /**
     * @var array
     */
    private $data;

    /**
     * Result constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Return error data
     *
     * @return Ezypay\Object | Ezypay\Object[]
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * Check is call successful
     * @return bool
     */
    public function isSuccess()
    {
        return $this->isSuccess;
    }
}