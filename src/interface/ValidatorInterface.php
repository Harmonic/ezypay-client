<?php
/**
 * Created by PhpStorm.
 * User: peroperje
 * Date: 13.5.16.
 * Time: 08.43
 */
interface validatorInterface {
    /**
     * @return bool
     */
    public function validate();

    /**
     * @return string
     */
    public function getFormattedError();
}