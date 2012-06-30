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

class Twilio_Twiml_Gather extends Twilio_Twiml_Nest {

    protected $noun = array();
    protected $default = array(
        'action' => '',
        'method' => 'POST',
        'timeout' => 5,
        'finishOnKey' => '#',
        'numDigits' => ''
    );
    protected $allowed_nested = array(
        'Twilio\\Twilio_Twiml_Say',
        'Twilio\\Twilio_Twiml_Play',
        'Twilio\\Twilio_Twiml_Pause'
    );

}