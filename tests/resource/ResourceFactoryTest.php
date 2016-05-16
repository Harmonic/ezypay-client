<?php
/**
 * Class ResourceFactoryTest
 *
 * Test create resource
 */
class ResourceFactoryTest extends PHPUnit_Framework_TestCase
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

        $json = file_get_contents('./mock/data/resourceFindAll.json');
        return json_decode($json, true);
    }
    /**
     * Test cerate resource
     *
     * @dataProvider dataProvider
     */
    public function testCreateResurce($resurceType)
    {
        $resource = \Ezypay\Ezypay::resource($resurceType, $this->connector,$this->validation);
        $class = '\Ezypay\Resource\\' . $resurceType;
        $this->assertInstanceOf($class, $resource, 'Failed. Can\'t create resorce' . $resurceType);
    }
    /**
     * Test default resourceType property
     *
     * @dataProvider dataProvider
     */
    public function testDefaultResourceType($resurceType)
    {
        $resource = \Ezypay\Ezypay::resource($resurceType, $this->connector,$this->validation);
        $this->assertAttributeEquals($resurceType, 'resourceType', $resource, 'Failed. Default resource type isn\'t correct ' . $resurceType);
    }
}
