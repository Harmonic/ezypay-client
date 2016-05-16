<?php

namespace Ezypay\Contract;


/**
 * Interface DriverInterface
 */
interface IDriver
{
    public function settings($data);

    public function call();

    public function getError();

    public function getHttpCode();
}