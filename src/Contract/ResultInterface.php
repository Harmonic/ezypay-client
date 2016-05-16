<?php
/**
 * Created by PhpStorm.
 * User: peroperje
 * Date: 2.5.16.
 * Time: 14.23
 */

/**
 * Interface Result
 */
interface result extends \Ezypay\Contract\Result
{
    /**
     * Result constructor.
     * @param array $data
     */
    public function __construct(array $data);


}