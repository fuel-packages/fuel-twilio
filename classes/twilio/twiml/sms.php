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

class Twilio_Twiml_Sms extends Twilio_Twiml_Verb
{
    /**
     * @var array Stored default attributes
     */
    protected $default = array(
        'to' => '',
        'from' => '',
        'action' => '',
        'method' => 'POST',
        'statusCallback' => '',
    );

}
