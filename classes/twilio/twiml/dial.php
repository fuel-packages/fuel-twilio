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

    protected $noun = array();
    protected $default = array(
        'action' => '',
        'method' => 'POST',
        'timeout' => '30',
        'hangupOnStar' => 'false',
        'timeLimit' => '14400',
        'callerId' => '',
        'record' => 'false',
    );
    protected $allowed_nested = array(
        'Twilio\\Twilio_Twiml_Number',
        'Twilio\\Twilio_Twiml_Client',
        'Twilio\\Twilio_Twiml_Conference'
    );

}
