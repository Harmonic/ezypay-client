<?php

/**
 * Class ResourceCustomerCustomTest
 *
 * Test for resource who implemets resourceInterfaceCustomer
 */
class ResourceCustomerCustomTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test Customer findByReferenceId method
     */
    public function testFindByReferenceID(){

        /**
         * @var $connector driverInterface
         */
        $connector = \Ezypay\Ezypay::driver('Curl', array(
            'base_url' => BASE_URL,
            'apiKey' => API_KEY
        ));

        $validation = new Ezypay\Validation\Validation();
        $id = 123456;
        /**
         * @var $resource resourceInterfaceCustomer
         */
        $resource = \Ezypay\Ezypay::resource('Customer',$connector,$validation);
        $resource->findByReferenceId($id);
        $this->assertAttributeEquals(BASE_URL, 'base_url', $connector, 'Failed. Base url not correct');
        $this->assertAttributeEquals('GET', 'method', $connector, 'Failed. Method is not correct');
        $this->assertAttributeEquals('customers/reference/' . $id, 'url', $connector, 'Failed. Url is not correct');
    }
}
