<?php


class ResoultProducerTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var $connector \Ezypay\Driver\Curl
     */
    protected $connector;
    /**
     * @var $resultProducer \Ezypay\Result\ResultProducer
     */
    protected $resultProducer;

    public function setUp()
    {
        $this->connector = \Ezypay\Ezypay::driver('Curl', array(
            'base_url' => BASE_URL,
            'apiKey' => API_KEY
        ));
        $validation = new \Ezypay\Validation\Validation();
        //$this->resource = \Ezypay\Ezypay::resource('Subscription', $this->connector,$validation);

        $this->resultProducer = new \Ezypay\Result\ResultProducer($this->connector,$validation, 'Customer');
    }

    public function dataProvider()
    {

        return array(
            'Return as object' => array('object', '\Ezypay\Result\ResultFactory'),
            'Return as json' => array('json', '\Ezypay\Result\ResultFactoryJson')
        );
    }

    /**
     * Test Result producer instace
     */
    public function testResultInstance()
    {
        $this->assertInstanceOf('\Ezypay\Result\ResultProducer', $this->resultProducer, 'Failed. Not correct instance');
    }

    /**
     * Test result() of ResultProducer
     * @dataProvider dataProvider
     */
    public function testResult($returnAs, $instanceOf)
    {
        $resultFactory = $this->resultProducer->result($returnAs);
        $this->assertInstanceOf('\Ezypay\Result\ResultAbstractFactory', $resultFactory, 'Failed. Not instance of \Ezypay\Result\ResultAbstractFactory ');
        $this->assertInstanceOf($instanceOf,$resultFactory,'Failed. it is not correct instance');

    }

}
