<?php
/**
 * Created by PhpStorm.
 * User: peroperje
 * Date: 13.5.16.
 * Time: 08.38
 */

namespace Ezypay\Validation;


abstract class ValidationBase
{
    /**
     * Add new vaidator
     *
     * @param \validatorInterface $validator
     * @return self
     */
    abstract function addValidator(\validatorInterface $validator);

    /**
     * Return array of validator objects
     * 
     * @return \validatorInterface[]
     */
    abstract function getValidators();

    /**
     * Check all validators
     * @return bool
     */
    abstract function isValid();

    /**
     * Return error as array
     *
     * @return array
     */
    abstract function getErrors();

    /**
     * Retrun errors as string
     *
     * @return string
     */
    abstract function getErrorString();

    /**
     * Clear validation instance state
     * 
     * @return void
     */
    abstract function clear();

}