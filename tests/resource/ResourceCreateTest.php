<?php

/**
 * Class ResourceCreateTest
 *
 * test create method of all Resource who implements resourceInterfaceCreate
 */
class ResourceCreateTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var driverInterface $connector connector
     */
    protected $connector;
    /**
     * @var $validation \Ezypay\Validation\ValidationBase
     */
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

        $this->validation = new \Ezypay\Validation\Validation();
    }

    /**
     * Provides resource data
     *
     * @return array
     */
    public function dataProvider()
    {
        $json = file_get_contents('./mock/data/resourceCreate.json');
        return json_decode($json, true);
    }

    /**
     * Test create method
     *
     * @dataProvider dataProvider
     */
    public function testCreate($resourceType, $createData)
    {
        if (empty($createData) || empty($createData['data'])) {
            $this->markTestSkipped('Skipped test for ' . $resourceType . '- not setted create data');
        }

        /**
         * @var  $resource resourceInterfaceCreate
         */
        $resource = \Ezypay\Ezypay::resource($resourceType, $this->connector,$this->validation);

        $resource->create($createData['data']);

        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct' . $resourceType);
        $this->assertAttributeEquals($createData['method'], 'method', $this->connector, 'Failed. Method is not correct' . $resourceType);
        $this->assertAttributeEquals($createData['url'], 'url', $this->connector, 'Failed. Url is not correct' . $resourceType);
        $this->assertAttributeEquals($createData['data'], 'data', $this->connector, 'Failed. Data is not same', 0.0, 10, true);

    }
}
