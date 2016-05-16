<?php


class ResultFactoryTest extends PHPUnit_Framework_TestCase
{


    /**
     * Data provider success
     *
     * Provide data for success test
     *
     * @return array
     */
    public function dataProviderSuccess()
    {
        return array(
            'test Customer List' => array('Customer', 'list', 'Ezypay\Contract\IResultList'),
           'test Customer Single' => array('Customer', 'single', 'Ezypay\Contract\IResult'),
        );
    }

    /**
     * Data provider error
     *
     * Provide data for error
     *
     * @return array
     */
    public function dataProviderError()
    {
        return array(
            'test Customer Error' => array('Customer', 'error', 'Ezypay\Contract\IResult')
        );
    }

    /**
     * Test success result of Result factory
     *
     * @dataProvider dataProviderSuccess
     * @param $resourceType string resource name from data provider
     * @param $resultType string result name from data provider
     * @param $implements string interface name from data provider
     */
    public function testRunSuccess($resourceType, $resultType, $implements)
    {

        $jsonResponse = file_get_contents('./mock/response/' . $resourceType . '_' . $resultType . '.json');

        $resultFactory = new \Ezypay\Result\ResultFactory(json_decode($jsonResponse, true),false, $resourceType);
        /**
         * @var $result result
         */
        $result = $resultFactory->run();

      //  $this->assertInstanceOf('IResult', $result, 'Failed.Not implemets result interface');
        $this->assertInstanceOf($implements, $result, 'Failed. Not implement custom interface.' . $implements);
        $this->assertTrue($result->isSuccess(), 'Failed. Is not success' . $resourceType . '-' . $resultType);
        $this->assertNotEmpty($result->data(), 'Failed. Data is empty ' . $resourceType . ' - ' . $resultType);

        $data = $resultType === 'list' ? $result->data()[0] : $result->data();
        $this->assertInstanceOf('\Ezypay\Object\\' . $resourceType, $data, 'Failed. Not instance of \\Ezypay\Object\\' . $resourceType);

    }

    /**
     * Test error result of ResultFactory
     *
     * @dataProvider dataProviderError
     * @param $resourceType string resource name from data provider
     * @param $resultType string result type from data provider
     */
    public function testRunError($resourceType, $resultType,$implements)
    {
        $jsonResponse = file_get_contents('./mock/response/' . $resourceType . '_' . $resultType . '.json');

        $resultFactory = new \Ezypay\Result\ResultFactory(false,json_decode($jsonResponse, true), $resourceType);


        /**
         * @var $result result
         */
        $result = $resultFactory->run();
        //$this->assertInstanceOf('result', $result, 'Failed.Not implemets result interface');
        $this->assertInstanceOf($implements, $result, 'Failed. Not implement custom interface.' . $implements);
        $this->assertFalse($result->isSuccess(), 'Failed. Is not success' . $resourceType . '-' . $resultType);

        $this->assertEquals(json_decode($jsonResponse,true),$result->data()['data'],'Failed. Data is not same');


    }

    /**
     * Test result success as json
     *
     * @dataProvider dataProviderSuccess
     * @param $resourceType string resource type from data provider
     * @param $resultType string result type from data provider
     */
    public function testRunSuccessJson($resourceType, $resultType)
    {

        $jsonResponse = file_get_contents('./mock/response/' . $resourceType . '_' . $resultType . '.json');

        $resultFactory = new \Ezypay\Result\ResultFactoryJson(json_decode($jsonResponse, true),false, $resourceType);

        /**
         * @var $result result
         */
        $result = $resultFactory->run();

        $this->assertTrue($result->isSuccess(),'Failed. Result is not true');
        $this->assertJsonStringEqualsJsonString($jsonResponse,$result->data() );

    }
    /**
     * Test error result of ResultFactory
     *
     * @dataProvider dataProviderError
     * @param $resourceType string resource name from dataprovider
     * @param $resultType string reult type from data provider
     */
    public function testRunErrorJson($resourceType, $resultType)
    {
        $jsonResponse = file_get_contents('./mock/response/' . $resourceType . '_' . $resultType . '.json');
       
        $resultFactory = new \Ezypay\Result\ResultFactoryJson(false,json_decode($jsonResponse, true), $resourceType);


        /**
         * @var $result result
         */
        $result = $resultFactory->run();

        $this->assertFalse($result->isSuccess(),'Faied. isSuccess is not false');
        $this->assertJsonStringEqualsJsonString($result->data(), $jsonResponse);
    }
}
