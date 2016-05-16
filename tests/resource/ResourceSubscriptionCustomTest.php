<?php

/**
 * Class ResourceSubscriptionCustomTest
 *
 * Test custom method of Subscription . Implementation resourceInterfaceSubscription
 */
class ResourceSubscriptionCustomTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var driverInterface $connector connector
     */
    protected $connector;
    /**
     * @var $resource \Ezypay\Resource\Subscription
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
        $this->resource = \Ezypay\Ezypay::resource('Subscription', $this->connector, $validation);

    }

    /**
     * Test preview() of Subscription
     */
    public function testPreview()
    {
        $data = array(
            'planId' => '0c91f62a-53db-4eb7-8503-8049a5fceffc'
        );
        $this->resource->preview($data);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct');
        $this->assertAttributeEquals('POST', 'method', $this->connector, 'Failed. Method is not correct');
        $this->assertAttributeEquals('subscriptions/preview', 'url', $this->connector, 'Failed. Url is not correct');
        $this->assertAttributeEquals($data, 'data', $this->connector, 'Failed. Data is not same as data');

    }

    /**
     * Test cancel of Subscription
     */
    public function testCancel()
    {
        $id = '5c27c3b5-4d63-456c-9c9d-6725b84defe0';
        $this->resource->cancel($id);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct');
        $this->assertAttributeEquals('PUT', 'method', $this->connector, 'Failed. Method is not correct');
        $this->assertAttributeEquals('subscriptions/' . $id . '/cancel', 'url', $this->connector, 'Failed. Url is not correct');
    }
}
