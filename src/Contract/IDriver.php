<?php

namespace Ezypay\Contract;


/**
 * Interface IDriver
 * @package Ezypay\Contract
 */
interface IDriver
{
    /**
     * Setting at fly
     *
     * @param $data
     * @return mixed
     */
    public function settings($data);

    /**
     * Exicute call
     *
     * @return mixed
     */
    public function call();

    /**
     * Return error or null
     *
     * @return mixed
     */
    public function getError();

    /**
     * Http code status
     * 
     * @return mixed
     */
    public function getHttpCode();
}