<?php
/**
 * This is the demo.php file. It helps to run some test on the BasicHttpClient
 * To be able to run this demo you need to have libcurl installed as a php extension 
 * and also the PHP version should be at least 5.1
 */

require 'httpclient/BasicHttpClient.php';

$clientId = "pitnnmim";
$clientPass = "btfdtdze";
$hostname = "api.smsgh.com";
$resource = "/messages/";

$baseUrl = "http://".$hostname."/v3";

// New instance of the BasicHttpClient
$httpClient = BasicHttpClient::build($baseUrl);
$httpClient->setBasicAuth($clientId, $clientPass);
$httpClient->setConnectionTimeout(0);
$httpClient->setReadTimeout(0);

// Let us send quick message against the SMSGH Unity Http API
$params = array(
    "From" => "smsgh",
    "To" => "+233244536448",
    "Content" => "Hey Micky What do you think you are doing?",
    "RegisteredDelivery" => "false",
    "Time" => "2014-02-02 10:00:00"
);

$response = $httpClient->post($resource, $params);
echo $response->getBody(); // raw Http response as it is sent
echo $response->getStatus(); // Http Status code
echo $response->getUrl();
echo $response->getHeaders(); // Http Response Headers
//$response = $httpClient->get($resource);
