<?php

/**
 * Class ResourceFindAllTes
 *
 * Test findAll method of all Resources who implements resourceInterface
 */
class ResourceFindAllTes extends PHPUnit_Framework_TestCase
{
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

        $json = file_get_contents('./mock/data/resourceFindAll.json');
        return json_decode($json, true);
    }

    /**
     * Provides resource data with parameters
     *
     * @return array
     */
    public function dataProviderWithParameters()
    {

        $json = file_get_contents('./mock/data/resourceFindAllWithParameters.json');
        return json_decode($json, true);
    }

    /**
     * Test Customer findAll settings with empty parameters
     *
     * @dataProvider dataProvider
     */
    public function testFindAllSettings($resurceType, $findAllData)
    {

        if (empty($findAllData)) {
            $this->markTestSkipped('Skipped test for ' . $resurceType . ' . findAll data is not setted.');
        }
        $resource = \Ezypay\Ezypay::resource($resurceType, $this->connector,$this->validation);
        $resource->findAll();


        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct' . $resurceType);
        $this->assertAttributeEquals($findAllData['method'], 'method', $this->connector, 'Failed. Method is not correct' . $resurceType);
        $this->assertAttributeEquals($findAllData['url'], 'url', $this->connector, 'Failed. Url is not correct' . $resurceType);
        $this->assertAttributeEquals($findAllData['data'], 'data', $this->connector, 'Failed. Data is not empty array' . $resurceType);
    }

    /**
     * Test Customer's findAll method with parameters
     *
     * @dataProvider dataProviderWithParameters
     */
    public function testFindAllSettingsWithParms($resurceType, $findAllData)
    {
        if (empty($findAllData) || empty($findAllData['data'])) {
            $this->markTestSkipped('Skipped test for ' . $resurceType . ' . findAll data is not setted.');
        }

        $resource = \Ezypay\Ezypay::resource($resurceType, $this->connector,$this->validation);
        $resource->findAll($findAllData['data']);


        $this->assertAttributeEquals(BASE_URL, 'base_url', $this->connector, 'Failed. Base url not correct' . $resurceType);
        $this->assertAttributeEquals($findAllData['method'], 'method', $this->connector, 'Failed. Method is not correct' . $resurceType);
        $this->assertAttributeEquals($findAllData['url'] . '?' . http_build_query($findAllData['data']), 'url', $this->connector, 'Failed. Url is not correct' . $resurceType);

    }

}