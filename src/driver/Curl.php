<?php


namespace Ezypay\Driver;
use Ezypay\Result\ResultList;

/**
 * Class Curl
 * @package Ezypay\Driver
 */
class Curl implements \driverInterface
{
    /**
     * @var $base_url string
     */
    private $base_url ;
    private $apiKey ;
    private $method ;
    private $data ;
    private $url ;
    private $error;
    private $http_status;


    /**
     * Curl constructor.
     * @param $data array settings ex. array('base_url'=>'http//base_url/v1','apiKey'=>'1234567890')
     */
    function __construct($data)
    {
        $this->base_url = $data['base_url'];
        $this->apiKey = $data['apiKey'];
    }

    /**
     * @param $data array aditional settinds ex. array("method" =>false,"url" =>false,"data"=> array()
     */
    public function settings($data)
    {
        $d = array_merge(array(
            "method" =>false,
            "url" =>false,
            "data"=> array(),
        ),$data);

        $this->method = $d["method"] ;
        $this->url = $d["url"];
        $this->data = $d['data'];
    }

    /**
     * @return bool|array
     */
    public function call()
    {
        try {
            $url = $this->base_url . $this->url;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->method);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERPWD, $this->apiKey);

            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($this->data));


            $result = curl_exec($ch);
            $this->http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if($this->http_status == '200')
            {

                return json_decode($result,true);

            }

           throw new \Exception($result);

        }catch (\Exception $e ){

            $this->error = json_decode($e->getMessage(),true);
            return false;
        }

    }

    /**
     * Return error
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return integer
     */
    public function getHttpCode()
    {
        return $this->http_status;
    }
}