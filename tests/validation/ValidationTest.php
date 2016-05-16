<?php

/**
 * Class ValidationTest
 *
 * Test implements \Ezypay\Validation\ValidationBase
 */
class ValidationTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var $validationInstance \Ezypay\Validation\ValidationBase
     */
    protected $validationInstance;

    public function setUp()
    {
        $this->validationInstance = new \Ezypay\Validation\Validation();
    }

    public function testAddvalidator()
    {

        $emptyString = new \Ezypay\Validation\NotEmptyString('46465465', 'ID is required');
        /**
         * @var $validation \Ezypay\Validation\ValidationBase
         */
        $validation = $this->validationInstance->addValidator($emptyString);
        $validatorsArray = $validation->getValidators();
        $this->assertNotEmpty($validatorsArray, 'Failed. Validators array is empty');

        foreach ($validatorsArray as $validator) {
            $this->assertInstanceOf('validatorInterface', $validator, 'Failed. Not implemets iterface validatorInterface ');
        }
    }

    /**
     * Test valid element
     */
    public function testIsValidSuccess()
    {
        $this->assertTrue($this->validationInstance->isValid(), 'Failed. Should be valid');

    }

    /**
     * Test validation with error
     */
    public function testIsValidError(){
        $emptyStringError = new \Ezypay\Validation\NotEmptyString('','ID is required ' );
        $validation = $this->validationInstance->addValidator($emptyStringError);
        $this->assertFalse($validation->isValid(),'Failed. Should be false');
        return $validation;
    }

    /**
     * @depends testIsValidError
     * @param $validation \Ezypay\Validation\ValidationBase
     */
    public function testGetErrors($validation){
        $this->assertNotEmpty($validation->getErrors(),'Failed. Error array is empty');
    }

    /**
     * Test error string
     *
     * @depends testIsValidError
     * @param $validation \Ezypay\Validation\ValidationBase
     */
    public function testGetErrorString($validation){
        $this->assertNotEmpty($validation->getErrorString(),'Failed.Error string is empty');
    }

    /**
     * Test clear instance state
     *
     * @depends testIsValidError
     * @param $validation \Ezypay\Validation\ValidationBase
     */
    public function testClear($validation){
        $arrayOfValidators = $validation->getValidators();
        $arrayOfErrors = $validation->getErrors();

        $this->assertNotEmpty($arrayOfValidators,'Failed. Array of validator is empty');
        $this->assertNotEmpty($arrayOfErrors,'Failed. Array of errors is empty');

        $validation->clear();

        $this->assertEmpty($validation->getValidators(),'Failed. Array of validators is not empty');
        $this->assertEmpty($validation->getErrors(),'Failed. Array of errors is not empty');
    }
}
