<?php
/**
 * This is the demo.php file. It helps to run some test on the BasicHttpClient
 * To be able to run this demo you need to have libcurl installed as a php extension 
 * and also the PHP version should be at least 5.1
 */

require 'src/BasicHttpClient.php';

$clientId = "qzixaaww";
$clientPass = "bttqkgzq";
$hostname = "api.smsgh.com";
$resource = "/account/profile/";

$baseUrl = "http://".$hostname."/v3";

// New instance of the BasicHttpClient
$httpClient = BasicHttpClient::init($baseUrl);
$httpClient->setBasicAuth($clientId, $clientPass);
$httpClient->setConnectionTimeout(0);
$httpClient->setReadTimeout(0);

$response = $httpClient->get($resource);
echo $response->getBody(); // raw Http response as it is sent
echo $response->getStatus(); // Http Status code
echo $response->getUrl();
echo $response->getHeaders(); // Http Response Headers
//$response = $httpClient->get($resource);
