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

class Twilio_Twiml_Say extends Twilio_Twiml_Verb {

    /**
     * @var array Stored default attributes
     */
    protected $default = array(
        'voice' => 'man',
        'language' => 'en',
        'loop' => '1'
    );

}