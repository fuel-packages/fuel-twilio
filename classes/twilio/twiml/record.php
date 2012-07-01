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

class Twilio_Twiml_Record extends Twilio_Twiml_Verb {

    /**
     * @var boolean Does the element have a noun
     */
    protected $has_noun = false;

    /**
     * @var array Stored default attributes
     */
    protected $default = array(
        'action' => '',
        'method' => 'POST',
        'timeout' => '5',
        'finishOnKey' => '1234567890*#',
        'maxLength' => '3600',
        'transcribe' => 'false',
        'transcribeCallback' => '',
        'playBeep' => 'true',
    );

}