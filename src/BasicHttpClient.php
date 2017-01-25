<?php

require 'AbstractHttpClient.php';
require 'BasicRequestHandler.php';

/**
 * This class implements routines that will help fire Http requests to a web server
 * in a restful manner.
 *
 * @author Arsene Tochemey GANDOTE
 *
 */
class BasicHttpClient extends AbstractHttpClient {

    public function __construct($baseUrl, $requestHandler) {
        parent::__construct($baseUrl, $requestHandler);
    }

    public static function init($baseUrl) {
        return new BasicHttpClient($baseUrl, new BasicRequestHandler());
    }

}
