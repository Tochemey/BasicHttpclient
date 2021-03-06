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

Also all requests are sent as form-urlencoded data.

## Usage
Copy the few file in the httpclient folder or clone it into your project and you are good to go.

Example code to post data from a Web Server with a Basic Authorization

    $clientId = "user2334";
    $clientPass = "password2344";
    $hostname = "api.smsgh.com";
    $resource = "/messages/";

    $baseUrl = "http://".$hostname."/v3";

    // New instance of the BasicHttpClient
    $httpClient = BasicHttpClient::init($baseUrl);
    $httpClient->setBasicAuth($clientId, $clientPass);
    $httpClient->setConnectionTimeout(0);
    $httpClient->setReadTimeout(0);

    // Let us send quick message against the Http API
    $params = array(
        "From" => "smsgh",
        "To" => "+2332409876789",
        "Content" => "Hey Micky What do you think you are doing?",
        "RegisteredDelivery" => "false"
    );

    $response = $httpClient->post($resource, $params);

    echo $response->getBody(); // raw Http response as it is received
    echo $response->getStatus(); // Http Status code
    echo $response->getUrl();
    echo $response->getHeaders(); // Http Response Headers

Example code to fetch data from a Web server 
    
    // Using get Http verb
    $response = $httpClient->get($resource);
### Notes

The server response stored in the $response variable is an instance of HttpResponse. The most important sections of that object
are the Status code and the response body. 
The status code is an integer and the response body is a json data string. So any Php json library can parse the json string.

## Milestone
* Support of SSL
* Asynchronous Requests for scalability sake
* Support for other content types like json etc...
