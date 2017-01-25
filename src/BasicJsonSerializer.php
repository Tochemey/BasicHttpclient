<?php

/**
 * Class BasicJsonSerializer
 * Utility class that helps encode and decode json using the php built-in json
 * functions
 */
class BasicJsonSerializer
{
    protected static $jsonErrors = array(
        JSON_ERROR_DEPTH => 'Maximum stack depth exceeded',
        JSON_ERROR_STATE_MISMATCH => 'State mismatch',
        JSON_ERROR_CTRL_CHAR => 'Unexpected control character found',
        JSON_ERROR_SYNTAX => 'Syntax error, malformed JSON',
        JSON_ERROR_UTF8 => 'Encoding error occurred'
    );

    /**
     * Deserialize a json string into an object.
     * @param $string the object to serialise
     * @return mixed the deserialized object
     * @throws Exception
     */
    public static function fromJson($string)
    {
        if (is_string($string)) {
            $json = json_decode($string);
            if (($err_code = json_last_error()) == JSON_ERROR_NONE) {
                return $json;
            }
            throw new Exception('json_decode(): '
                . (isset(self::$jsonErrors[$err_code]) ?
                    self::$jsonErrors[$err_code] : 'Unknown error'));
        }
    }

    /**
     * Serializes an object to json string
     * @param $object the object to serialize
     * @return string
     */
    public static function toJson($object)
    {
        $obj = new stdClass;
        if (is_object($object)) {
            foreach (get_class_methods($object) as $method) {
                if (strncmp($method, 'set', 3))
                    continue;
                $prop = substr($method, 3);
                $method = array($object, 'get' . $prop);
                if (is_callable($method))
                    $obj->{$prop} = call_user_func($method);
            }
        }
        return json_encode($obj);
    }

}