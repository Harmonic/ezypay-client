<?php

/**
 * Created by PhpStorm.
 * User: peroperje
 * Date: 8.5.16.
 * Time: 13.22
 */
class ResourcePlanCustomTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var DriverInterface $connector connector
     */
    protected $connector;
    /**
     * @var $resource \Ezypay\Resource\Plan
     */
    protected $resource;

    /**
     * @return DriverInterface
     */
    public function setUp()
    {
        $this->connector = \Ezypay\Ezypay::driver('Curl', array(
            'base_url' => BASE_URL,
            'apiKey' => API_KEY
        ));
        $validation = new \Ezypay\Validation\Validation();
        $this->resource = \Ezypay\Ezypay::resource('Plan', $this->connector,$validation);

    }

    /**
     * Test deactivate() of Plan
     * TODO : move to ResourceDeleteTest
     */
    public function testDeactivate()
    {
        $id = '1952ab7c-d7c4-4744-b283-a616934166b2';
        $this->resource->deactivate($id);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct');
        $this->assertAttributeEquals('DELETE', 'method', $this->connector, 'Failed. Method is not correct');
        $this->assertAttributeEquals('plans/' . $id, 'url', $this->connector, 'Failed. Url is not correct');
    }
}
