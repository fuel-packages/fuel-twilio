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

class Twilio_Twiml_Dial extends Twilio_Twiml_Nest {

    /**
     * @var array Stored an array of allowed_nested objects 
     */
    protected $noun = array();

    /**
     * @var array Stored default attributes
     */
    protected $default = array(
        'action' => '',
        'method' => 'POST',
        'timeout' => '30',
        'hangupOnStar' => 'false',
        'timeLimit' => '14400',
        'callerId' => '',
        'record' => 'false',
    );

    /**
     * @var array An array of allowed nested objects
     */
    protected $allowed_nested = array(
        'Twilio\\Twilio_Twiml_Number',
        'Twilio\\Twilio_Twiml_Client',
        'Twilio\\Twilio_Twiml_Conference'
    );

}
