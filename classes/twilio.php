<?php

/**
 * A package to use Twilio api https://www.twilio.com.
 *
 * @package    Twilio
 * @version    0.1
 * @author     Matthew McConnell
 * @license    MIT License
 * @copyright  2012 Matthew McConnell
 * @link       http://maca134.co.uk
 */

namespace Twilio;

/**
 * Exception for Twilio 
 */
class Twilio_Exception extends \FuelException {}

class Twilio {

    /**
     * @var array $allowed_requests Allowed Twilio requests 
     */
    private static $allowed_requests = array(
        'SmsMessage',
        'MakeCall',
        'Accounts',
        'Recordings',
        'Transcriptions'
    );

    /**
     * Prepares a request and returns the object
     * 
     * @param string $type
     * @return Twilio_Request 
     * @throws Twilio_Exception 
     */
    public static function request($type) {
        $class = 'Twilio\Twilio_Request_' . $type;
        if (!in_array($type, static::$allowed_requests) or !class_exists($class)) {
            throw new Twilio_Exception($type . ' does not exist');
        }
        return call_user_func(array($class, 'forge'));
    }

    /**
     * Gets a Twiml object
     * 
     * @return Twilio_Twiml
     */
    public static function twiml() {
        return Twilio_Twiml::forge();
    }

}
