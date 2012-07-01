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

class Twilio_Twiml_Play extends Twilio_Twiml_Verb {

    /**
     * @var array Stored default attributes
     */
    protected $default = array(
        'loop' => '1'
    );

}