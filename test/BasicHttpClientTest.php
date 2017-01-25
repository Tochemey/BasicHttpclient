<?php
require '..\src\BasicHttpClient.php';

class BasicHttpClientTest extends PHPUnit_Framework_TestCase
{
    protected static $clientId;
    protected static $clientSecret;
    protected static $baseUrl;
    protected static $httpClient;

    public static function setUpBeforeClass()
    {
        self::$clientId = "root@okada.com";
        self::$clientSecret = 'P@$$w0rd@Okada';
        self::$baseUrl = "http://52.169.120.151:2000/okada";
        self::$httpClient = BasicHttpClient::init(self::$baseUrl);
        self::$httpClient->setBasicAuth(self::$clientId, self::$clientSecret);
        self::$httpClient->setConnectionTimeout(0);
        self::$httpClient->setReadTimeout(0);
    }

    public function testGet()
    {
        $resource = "/countries/";
        $response = self::$httpClient->get($resource);
        $this->assertTrue($response != NULL);
        $this->assertEquals(200, $response->getStatus());
        $this->assertNotEmpty($response->getBody());
        $this->assertTrue(is_string($response->getBody()));
    }

    public function testGetWithQueryString(){
        $resource = "/countries/";
        $params = array(
            "countryName" => "Ghana"
        );
        $response = self::$httpClient->get($resource, $params);
        $this->assertTrue($response != NULL);
        $this->assertEquals(200, $response->getStatus());
        $this->assertNotEmpty($response->getBody());
        $this->assertTrue(is_string($response->getBody()));
    }
    
    public function testPost()
    {
        $resource = "/admin/users/";
        // Let us send quick message against the Http API
        $params = array(
            "From" => "Tochemey",
            "To" => "+233243219176",
            "Content" => "Hey Honey I love you?",
            "RegisteredDelivery" => "false"
        );

        $response = self::$httpClient->post($resource, $params);
        $this->assertTrue($response != NULL);
        $this->assertEquals(201, $response->getStatus());
        $this->assertNotEmpty($response->getBody());
        $this->assertTrue(is_string($response->getBody()));
    }
}
