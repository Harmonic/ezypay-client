<?php

/**
 * User: peroperje
 * Date: 7.5.16.
 * Time: 12.29
 */
class ResourceFindByIdTest extends PHPUnit_Framework_TestCase
{
    protected $connector;

    protected $validation;

    /**
     * @return DriverInterface
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

        $json = file_get_contents('./mock/data/resourceFindById.json');
        //print_r(json_decode($json, true));
        return json_decode($json, true);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testFindByIDSettings($resurceType, $findById)
    {

        if (empty($findById) || empty($findById['ID'])) {
            $this->markTestSkipped('Skipped test for ' . $resurceType . ' . findAll data is not setted.');
        }
        $resource = \Ezypay\Ezypay::resource($resurceType, $this->connector,$this->validation);
        $resource->findById($findById['ID']);


        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct' . $resurceType);
        $this->assertAttributeEquals($findById['method'], 'method', $this->connector, 'Failed. Method is not correct' . $resurceType);
        $this->assertAttributeEquals($findById['url'] . '/' . $findById['ID'], 'url', $this->connector, 'Failed. Url is not correct' . $resurceType);
    }
}
