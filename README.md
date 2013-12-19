Basic Http Client
=======================

A minimal HTTP client that uses php cURL extension to make requests. 
It is mainly a wrapper around the famous and robust php extension cURL.
It features a simple interface for making Web requests.
It has been written and tested on an environment using Php Version 5.1 with cURL enabled. 
Please bear with me there are better libraries out there. I just want to have fun and also control over what I have done. 
It is easy at that stage to fix issues and respond to users worries or bugs.

## Requirements
As stated in the brief introduction the library requires the php cURL extension to be enabled. Also PHP 5.1 will make it easier to use.

## Features
Currently the following HTTP verb are supported:
* GET
* POST
* PUT
* HEAD
* DELETE

## Usage
Copy the few file in the httpclient folder or clone it into your project and you are good to go.

Example code to post data from a Web Server with a Basic Authorization

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

    // Let us send quick message against the Http API
    $params = array(
        "From" => "smsgh",
        "To" => "+233244536448",
        "Content" => "Hey Micky What do you think you are doing?",
        "RegisteredDelivery" => "false"
    );

    $response = $httpClient->post($resource, $params);
    echo $response->getBody(); // Display the response content

Example code to fetch data from a Web server 
    
    // Using get Http verb
    $response = $httpClient->get($resource);

## Milestone
* Support of SSL
* Asynchronous Requests for scalability sake