<?php


class ResourcePaymentMethodCustomTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var DriverInterface $connector connector
     */
    protected $connector;
    /**
     * @var $resource \Ezypay\Resource\PaymentMethod
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
        $this->resource = \Ezypay\Ezypay::resource('PaymentMethod', $this->connector,$validation);

    }

    /**
     * Test findDefault() of PaymentMethod resource
     */
    public function testFindDefault()
    {
        $data = array(
            'customerId' => '33160580-3e25-49f4-b01c-274634cb3011'
        );
        $this->resource->findDefault($data);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct');
        $this->assertAttributeEquals('GET', 'method', $this->connector, 'Failed. Method is not correct');
        $this->assertAttributeEquals('paymentmethods/default?' . http_build_query($data), 'url', $this->connector, 'Failed. Url is not correct');

    }

    /**
     * Test setDefaoult() of Paymentmethod
     */
    public function testSetDefault()
    {
        $paymentMethodId = '270283ff-dea9-4f5a-aec7-5fa89eb2508f';
        $customerId = '20e68ad7-ff54-4cb6-8556-f87f58bcf995';
        $this->resource->setDefault($paymentMethodId, $customerId);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct');
        $this->assertAttributeEquals('PUT', 'method', $this->connector, 'Failed. Method is not correct');
        $this->assertAttributeEquals('paymentmethods/' . $paymentMethodId . '/default?customerId=' . $customerId, 'url', $this->connector, 'Failed. Url is not correct');
    }

    /**
     * Test remove() of PaymentMethod
     * TODO: move to interfaceDelete , muve to test ResourceDeleteTest
     */
    public function testRemove()
    {
        $paymentMethodId = '36538b73-0ff9-4bf6-bc94-20f499b4f85d';
        $customerId = '20e68ad7-ff54-4cb6-8556-f87f58bcf995';

        $this->resource->remove($paymentMethodId,$customerId);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct');
        $this->assertAttributeEquals('DELETE', 'method', $this->connector, 'Failed. Method is not correct');
        $this->assertAttributeEquals('paymentmethods/' . $paymentMethodId . '?customerId=' .$customerId, 'url', $this->connector, 'Failed. Url is not correct');
    }
}
