<?php

/**
 * Class ResourceInvoiceItemCustomTest
 *
 * Test custom method of Resource InvoiceItem
 */
class ResourceInvoiceItemCustomTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test delete() method of InvoiceItem resource
     */
    public function testDelete()
    {
        $id = '0215a60f-6d6b-4f21-9af8-15d76e815fe5';
        /**
         * @var $connector driverInterface
         */
        $connector = \Ezypay\Ezypay::driver('Curl', array(
            'base_url' => BASE_URL,
            'apiKey' => API_KEY
        ));
        $validation = new \Ezypay\Validation\Validation();
        /**
         * @var $resource \Ezypay\Resource\InvoiceItem
         */
        $resource = \Ezypay\Ezypay::resource('InvoiceItem',$connector,$validation);

        $resource->delete($id);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $connector, 'Failed. Base url not correct');
        $this->assertAttributeEquals('DELETE', 'method', $connector, 'Failed. Method is not correct');
        $this->assertAttributeEquals('invoiceitems/' . $id, 'url', $connector, 'Failed. Url is not correct');

    }
}
