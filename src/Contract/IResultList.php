<?php
/**
 * Created by PhpStorm.
 * User: peroperje
 * Date: 16.5.16.
 * Time: 09.29
 */
namespace Ezypay\Contract;

interface IResultList extends IResult
{
    public function totalReturned();

    public function totalRecord();
}