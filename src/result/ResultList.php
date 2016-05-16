<?php


namespace Ezypay\Result;


use Ezypay;

/**
 * Class ResultList
 *
 * @package Ezypay\Result
 */
class ResultList implements \resultInterfaceList
{
    /**
     * @var $totalReturned int
     */
    private $totalReturned;
    /**
     * @var $totalRecord int
     */
    private $totalRecord;
    /**
     * @var $data Ezypay\Object | Ezypay\Object[]
     */
    private $data;
    /**
     * @var bool $isSuccess
     */
    private $isSuccess = true;

    /**
     * Result constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                //echo $key .' ' .$value .'<br>';
                $this->$key = $value;
            }

        }
    }

    /**
     * Return array of objects
     *
     * @return Ezypay\Object | Ezypay\Object[]
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * Give information is call successful
     *
     * @return bool
     */
    public function isSuccess()
    {
        return $this->isSuccess;
    }

    /**
     * Provide total of returned record
     *
     * @return int
     */
    public function totalReturned()
    {
        return $this->totalReturned;
    }

    /**
     * Provide total of records
     *
     * @return int
     */
    public function totalRecord()
    {
        return $this->totalRecord;
    }
}