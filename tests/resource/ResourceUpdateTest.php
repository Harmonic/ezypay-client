<?php

/**
 * Class ResourceUpdateTest
 *
 * Test update method of all Resource who implements resourceInterfaceUpdate
 */
class ResourceUpdateTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var driverInterface $connector connector
     */
    protected $connector;

    protected $validation;

    /**
     * @return driverInterface
     */
    public function setUp()
    {
        $this->connector = \Ezypay\Ezypay::driver('Curl', array(
            'base_url' => BASE_URL,
            'apiKey' => API_KEY
        ));

        $this->validation = new Ezypay\Validation\Validation();
    }

    /**
     * Provides resource data
     *
     * @return array
     */
    public function dataProvider()
    {
        $json = file_get_contents('./mock/data/resourceUpdate.json');
        return json_decode($json, true);
    }

    /**
     * Test update method
     *
     * @dataProvider dataProvider
     * @param $resourceType
     * @param $updateData
     */
    public function testUpdate($resourceType, $updateData)
    {
        
        if (empty($updateData) || empty($updateData['ID']) || empty($updateData['data'])) {
            $this->markTestSkipped('Skipped test for ' . $resourceType . ' - not setted data');
        }
        /**
         * @var $resource resourceInterfaceUpdate
         */
        $resource = \Ezypay\Ezypay::resource($resourceType, $this->connector,$this->validation);
        $resource->update($updateData['ID'], $updateData['data']);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct' . $resourceType);
        $this->assertAttributeEquals($updateData['method'], 'method', $this->connector, 'Failed. Method is not correct' . $resourceType);
        if ($resourceType !== 'Subscription') {
            $this->assertAttributeEquals($updateData['url'] . '/' . $updateData['ID'], 'url', $this->connector, 'Failed. Url is not correct' . $resourceType);
            $this->assertAttributeEquals($updateData['data'], 'data', $this->connector, 'Failed. Data is not same', 0.0, 10, true);
        } else {
            $this->assertAttributeEquals($updateData['url'] . '/' . $updateData['ID'] . '/paymentmethod/' . $updateData['data']['paymentmethodId'], 'url', $this->connector, 'Failed. Url is not correct' . $resourceType);
        }

        $this->assertTrue(true);
    }
}
