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

class Twilio_Twiml {

    public static function forge() {
        return new static();
    }

    private $verbs = array();
    private $allowed_verbs = array(
        'say',
        'play',
        'record',
        'sms',
        'hangup',
        'redirect',
        'reject',
        'pause',
        'dial',
        'gather',
        'say',
        'play',
        'pause',
        'number',
        'client',
        'conference'
    );

    public function __call($verb, $args = array()) {

        if ($verb == 'render') {
            return $this->render();
        }

        if (!in_array($verb, $this->allowed_verbs) && !array_key_exists($verb, $this->allowed_verbs)) {
            throw new Twilio_Twiml_Exception($verb . ' is invalid');
        }
        if (in_array($verb, $this->allowed_verbs)) {
            $noun = (isset($args[0])) ? $args[0] : '';
            $attr = (isset($args[1])) ? $args[1] : '';
            return $this->verb($verb, $attr, $noun);
        }
    }

    private function verb($verb, $attr = array(), $noun = '') {
        $class = 'Twilio_Twiml_' . ucwords(strtolower($verb));
        if (class_exists($class)) {
            $this->verbs[] = new $class($attr, $noun);
        } else {
            throw new Twilio_Twiml_Exception($class . ' does not exist.');
        }
        return $this;
    }

    public function render() {
        $nl = "\n";
        $twiml = '<?xml version="1.0" encoding="UTF-8" ?>' . $nl;
        $twiml .= '<Response>' . $nl;
        foreach ($this->verbs as $verb) {
            $twiml .= $verb->render() . $nl;
        }
        $twiml .= '</Response>' . $nl;
        return $twiml;
    }

    public function verbs() {
        return $this->verbs;
    }

}

class Twilio_Twiml_Exception extends \FuelException {
    
}
