<?php

namespace Ezypay\Result;

use Ezypay\Contract\IResult;
use Ezypay\Contract\IResultList;

/**
 * Class ResultFactoryArray
 *
 * @package Ezypay\Result
 */
class ResultFactoryArray extends ResultAbstractFactory
{

    /**
     * Run method
     *
     * @return mixed
     */
    function run()
    {
        $res = $this->res;
        $err = $this->err;

        if (!empty($err)) {

            return $this->createInstance('ResultError', array(
                'data' => $err
            ));
            //return ResultFactory::
        }

        if (array_key_exists('data', $res)) {

            $properties = array(
                'totalReturned' => $res['totalReturned'],
                'totalRecord' => $res['totalRecord'],
                'data' => $res['data']
            );
            return $this->createInstance('ResultListArray', $properties);
        } else {
            return $this->createInstance('ResultSingleArray', array('data'=>$res));
        }

    }

    /**
     * Create instance
     *
     * @param $name string class name
     * @param $data array propery array
     * @return IResult | IResultList
     */
    private function createInstance($name, $data)
    {
        if (class_exists('Ezypay\\Result\\' . $name)) {
            $class = 'Ezypay\\Result\\' . $name;
            return new $class($data);
        }
    }
}