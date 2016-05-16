<?php

/**
 * Class ResourceSettlementCustomTest
 *
 * Test custom method of Settlement
 */
class ResourceSettlementCustomTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var DriverInterface $connector connector
     */
    protected $connector;
    /**
     * @var $resource \Ezypay\Resource\Settlement
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
        $validation  = new \Ezypay\Validation\Validation();
        $this->resource = \Ezypay\Ezypay::resource('Settlement', $this->connector,$validation);

    }

    /**
     * Test latest() of Settlement
     */
    public function testLatest()
    {
        $merchantId = MERCHANT_ID;

        $this->resource->latest($merchantId);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct');
        $this->assertAttributeEquals('GET', 'method', $this->connector, 'Failed. Method is not correct');
        $this->assertAttributeEquals('settlements/' . $merchantId . '/latest', 'url', $this->connector, 'Failed. Url is not correct');
    }

    /**
     * Test findAll() of Settlement
     */
    public function testFindAll()
    {
        $data = array(
            'merchantId' => MERCHANT_ID
        );

        $this->resource->findAll($data);

        $merchantId = $data['merchantId'];
        unset($data['merchantId']);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct');
        $this->assertAttributeEquals('GET', 'method', $this->connector, 'Failed. Method is not correct');
        $this->assertAttributeEquals('settlements/' . $merchantId . '?' . http_build_query($data), 'url', $this->connector, 'Failed. Url is not correct');
    }

    /**
     * Test getRevenue() of Settlement
     */
    public function testGetRevenue()
    {
        $merchantId = MERCHANT_ID;
        $settlementId = 738;

        $this->resource->getRevenue($merchantId, $settlementId);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct');
        $this->assertAttributeEquals('GET', 'method', $this->connector, 'Failed. Method is not correct');
        $this->assertAttributeEquals('settlements/' . $merchantId . '/revenue/' . $settlementId, 'url', $this->connector, 'Failed. Url is not correct');
    }

    /**
     * Test getDeduction() of Settlement
     */
    public function testGetDeduction()
    {
        $merchantId = MERCHANT_ID;
        $settlementId = 738;

        $this->resource->getDeduction($merchantId,$settlementId);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct');
        $this->assertAttributeEquals('GET', 'method', $this->connector, 'Failed. Method is not correct');
        $this->assertAttributeEquals('settlements/' . $merchantId . '/deduction/' . $settlementId, 'url', $this->connector, 'Failed. Url is not correct');

    }
}
