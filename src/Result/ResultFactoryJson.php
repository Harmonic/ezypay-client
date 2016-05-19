<?php

namespace Ezypay\Result;

/**
 * Class ResultFactoryJson
 *
 * @package Ezypay\Result
 */
class ResultFactoryJson extends ResultAbstractFactory
{
    /**
     * Exicute call and create response
     * @return \result
     */
    public function run()
    {
        $res = $this->res;
        $err = $this->err;

        return new ResultJson(array(
            'isSuccess' => empty($err) ? true : false,
            'data' => empty($err) ? json_encode($res) : json_encode($err)
        ));
    }
}