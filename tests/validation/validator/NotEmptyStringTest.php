<?php


class NoEmptyStringTest extends PHPUnit_Framework_TestCase
{
    /**
     * Provides valid instance
     * @return array
     */
    public function validInstance()
    {
        return array(
            array(new \Ezypay\Validation\NotEmptyString('145465', 'ID is required'))
        );
    }

    /**
     * Provides error instance
     *
     * @return array
     */
    public function inValidInstance()
    {
        return array(
            array(new \Ezypay\Validation\NotEmptyString('', 'ID is required'))
        );
    }

    /**
     * Test validate method for valid instance
     *
     * @dataProvider validInstance
     * @param $instance validatorInterface
     */
    public function testValidationValid($instance)
    {
        $this->assertTrue($instance->validate(), 'Failed. Should be valid');
    }

    /**
     * Test getFormattedError for valid instance
     *
     * @dataProvider validInstance
     * @param $instance validatorInterface
     */
    public function testGetFormattedErrorValid($instance)
    {
        $this->assertEmpty($instance->getFormattedError(), 'Failed. Should be empty');
    }

    /**
     * Test invalid instance
     *
     * @dataProvider inValidInstance
     * @param $instance validatorInterface
     */
    public function testValidationInValid($instance)
    {
        $this->assertFalse($instance->validate(),'Failed. Should be false');
    }

    /**
     * Test getFormattedError for invalid instance
     *
     * @dataProvider  inValidInstance
     * @param $instance validatorInterface
     */
    public function testGetFormattedErrorInValid($instance){
        $this->assertEmpty($instance->getFormattedError(),'Failed. Should be empty');
    }
}
