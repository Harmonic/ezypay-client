<?php

/**
 * @author : peroperje
 */

/**
 * Class ResourceInvoiceCustomTest
 *
 * Test custom Invoice method . Implementation of resourceInterfaceInvoice
 */
class ResourceInvoiceCustomTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var $connector driverInterface
     */
    protected $connector;
    /**
     * @var $resource \Ezypay\Resource\Invoice
     */
    protected $resource;

    /**
     * @return driverInterface
     */
    public function setUp()
    {

        $this->connector = \Ezypay\Ezypay::driver('Curl', array(
            'base_url' => BASE_URL,
            'apiKey' => API_KEY
        ));
        $validation = new \Ezypay\Validation\Validation();
        $this->resource = \Ezypay\Ezypay::resource('Invoice', $this->connector,$validation);

    }

    /**
     * Test getNext() of Invoice resource
     */
    public function testGetNext()
    {
        $customerId = '33160580-3e25-49f4-b01c-274634cb3011';
        $subscriptionId = '2decdd31-c02e-46fa-93d6-4cf5f4b06708';
        $this->resource->getNext($customerId, $subscriptionId);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct');
        $this->assertAttributeEquals('GET', 'method', $this->connector, 'Failed. Method is not correct');
        $this->assertAttributeEquals('invoices/next?customerId=' . $customerId . '&subscriptionId=' . $subscriptionId, 'url', $this->connector, 'Failed. Url is not correct');
    }

    /**
     * Tets refund() of Invoice resource
     */
    public function testRefund()
    {

        $id = 'ee1c8c70-708e-43bf-ad54-1146f5b59664';
        $this->resource->refund($id);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct');
        $this->assertAttributeEquals('PUT', 'method', $this->connector, 'Failed. Method is not correct');
        $this->assertAttributeEquals('invoices/' . $id . '/refund', 'url', $this->connector, 'Failed. Url is not correct');

    }

    /**
     * Test markAsPaid() of Invoice Resource
     */
    public function testMarkAsPaid()
    {
        $id = 'ee1c8c70-708e-43bf-ad54-1146f5b59664';
        $this->resource->markAsPaid($id);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct');
        $this->assertAttributeEquals('PUT', 'method', $this->connector, 'Failed. Method is not correct');
        $this->assertAttributeEquals('invoices/' . $id . '/markaspaid', 'url', $this->connector, 'Failed. Url is not correct');
    }

    /**
     * Test delete() of Invoice
     */
    public function testDelete()
    {
        $id = 'ee1c8c70-708e-43bf-ad54-1146f5b59664';
        $this->resource->delete($id);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct');
        $this->assertAttributeEquals('DELETE', 'method', $this->connector, 'Failed. Method is not correct');
        $this->assertAttributeEquals('invoices/' . $id, 'url', $this->connector, 'Failed. Url is not correct');
    }
}
