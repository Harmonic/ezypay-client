<?php

/**
 * Interface driverInterface
 */
interface driverInterface {
    public function settings($data);
    public function call();
    public function getError();
    public function getHttpCode();
}