<?php
/**
 * Created by PhpStorm.
 * User: peroperje
 * Date: 6.5.16.
 * Time: 13.51
 */

namespace Ezypay\Result;
use Ezypay\Contract\IResult;

/**
 * Class ResultJson
 *
 * @package Ezypay\Result
 */
class ResultJson implements IResult
{
    /**
     * @var $isSuccess bool
     */
    private $isSuccess;
    /**
     * @var $data string json string
     */
    private $data;

    /**
     * ResultJson constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->isSuccess = $data['isSuccess'];
        $this->data = $data['data'];
    }

    /**
     * Check is call success
     * 
     * @return bool
     */
    public function isSuccess()
    {
        return $this->isSuccess;
    }

    /**
     * Return result data as json string
     *
     * @return string json string
     */
    public function data()
    {
        return $this->data;
    }
}