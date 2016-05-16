<?php

/**
 * Class CurlTest
 *
 * Test Curl driver
 */
class CurlTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var $connector \Ezypay\Driver\Curl
     */
    protected $connector;

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
     * Test instace
     */
    public function testCreateDriver()
    {

        $connector = \Ezypay\Ezypay::driver("Curl", array(
            'base_url' => BASE_URL,
            'apiKey' => API_KEY
        ));
        $this->assertInstanceOf('\Ezypay\Driver\Curl', $connector);

    }

    /**
     * Test settings() method
     */
    public function testSettings()
    {
        $settings = array(
            "method" => 'GET',
            "url" => 'merchants'
        );
        $this->connector->settings($settings);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url is not correct');
        $this->assertAttributeEquals(API_KEY, 'apiKey', $this->connector, 'Failed. Api key is not correct');
        $this->assertAttributeEquals($settings['method'], 'method', $this->connector, 'Failed. Method is not correct');
        $this->assertAttributeEquals($settings['url'], 'url', $this->connector, 'Failed. Url is not correct');
        $this->assertAttributeEmpty('data', $this->connector, 'Failed. Data is not empty ');
    }

    /**
     * Test call() of Curl
     *
     * This test makes real api call
     */
    public function testCall()
    {
        $responseMock = file_get_contents('./mock/response/merchants_list.json');
        $settings = array(
            "method" => 'GET',
            "url" => 'merchants'
        );

        $this->connector->settings($settings);
        $response = $this->connector->call();

        $this->assertAttributeEmpty('error', $this->connector, 'Failed. Error property is not empty');
        $this->assertAttributeEquals(200, 'http_status', $this->connector, 'Failed. Http status is not 200');
        $this->assertEquals(json_decode($responseMock, true), $response, 'Failed. Response is not correct');


    }

    /**
     * Test getError() of Curl
     *
     * This test make real api call
     */
    public function testGetError()
    {
        $settings = array(
            "method" => 'GET',
            "url" => 'merchants/45' . MERCHANT_ID
        );
        $this->connector->settings($settings);
        $response = $this->connector->call();
        $err = $this->connector->getError();

        $this->assertAttributeNotEmpty('error', $this->connector, 'Failed. Error is empty');
        $this->assertAttributeNotEquals(200, 'http_status', $this->connector, 'Faield. HTTP code is same as 200');
        $this->assertFalse($response, 'Failed. Response is not false');
        $this->assertNotEmpty($err, 'Failed. error is empty');
    }

}