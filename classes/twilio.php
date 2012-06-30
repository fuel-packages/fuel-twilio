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

class Twilio {
    private static $allowed_requests = array(
        'SmsMessage',
        'MakeCall',
        'Accounts',
        'Recordings',
        'Transcriptions'
    );
    
    public static function request($type) {
        $class = 'Twilio\Twilio_Request_' . $type;
         if (!in_array($type, static::$allowed_requests) || !class_exists($class)) {
            throw new Twilio_Exception($type . ' does not exist');
        }
        return call_user_func(array($class, 'forge'));
    }
    
    public static function twiml() {
        return Twilio_Twiml::forge();
    }
    
}
class Twilio_Exception extends \FuelException {
    
}