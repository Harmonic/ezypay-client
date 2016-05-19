<?php


namespace Ezypay\Result;

use Ezypay\Contract\IDriver;
use Ezypay\Validation\ValidationBase;

/**
 * Class ResultProducer
 *
 * Result Abstract Factory Producer.
 *
 * @package Ezypay\Result
 */
class ResultProducer
{
    /**
     * @var IDriver $connector connector
     */
    protected $connector;
    /**
     * @var string $resourceType resource name
     */
    protected $resourceType;

    protected $validation;

    /**
     * ResultProducer constructor.
     *
     * @param IDriver $connector
     * @param $validation ValidationBase
     * @param $resourceType string resource name
     */
    public function __construct(IDriver $connector, ValidationBase $validation, $resourceType)
    {
        $this->connector = $connector;
        $this->resourceType = $resourceType;
        $this->validation = $validation;
    }

    /**
     * Return Validation
     *
     * @return ValidationBase
     */
    public function validation()
    {
        return $this->validation;
    }

    /**
     * Result
     *
     * @param string $returnAs
     * @return ResultAbstractFactory|null
     */
    public function result($returnAs = 'object')
    {
        if (!$this->validation->isValid()) {
            $res = null;
            $err = $this->validation->getErrors();
        } else {
            $res = $this->connector->call();
            $err = $this->connector->getError();
        }


        $result = null;
        switch ($returnAs) {
            case 'object':

                $result = new ResultFactory($res, $err, $this->resourceType);
                break;
            case 'json':
                $result = new ResultFactoryJson($res, $err, $this->resourceType);
                break;
            case 'array':
                $result = new ResultFactoryArray($res, $err, $this->resourceType);
                break;
        }

        $this->validation->clear();
        
        return $result;

    }

}