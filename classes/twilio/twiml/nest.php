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

abstract class Twilio_Twiml_Nest extends Twilio_Twiml_Verb {

    /**
     * @var boolean Does the element has nested objects
     */
    protected $has_nested = true;

    /**
     * Twilio_Twiml_Nest constructor 
     * 
     * @param array $attr An array of attributes for the element
     * @param mixed $noun Either a string or an array of nested objects
     */
    public function __construct($attr = array(), $noun = '') {
        $this->attr = $attr;

        if (is_object($noun) && get_class($noun) == 'Twilio\Twilio_Twiml') {
            foreach ($noun->verbs() as $verb) {
                $class = get_class($verb);
                if (!in_array($class, $this->allowed_nested)) {
                    continue;
                }
                $this->noun[] = $verb;
            }
        } else {
            $this->noun = $noun;
        }
    }

    /**
     * Renders the Twiml document, overrides Twilio_Twiml_Verb method
     * 
     * @return string An Twiml document
     */
    public function render() {
        $attrStr = '';
        $noun = '';
        $verbStr = str_replace('Twilio\\Twilio_Twiml_', '', get_called_class());

        if (is_array($this->noun)) {
            foreach ($this->noun as $verb) {
                $noun .= $verb->render() . "\n";
            }
        } else {
            $noun = $this->noun;
        }

        foreach ($this->default as $key => $val) {
            $val = (isset($this->attr[$key])) ? $this->attr[$key] : $val;
            $attrStr .= (!empty($val)) ? "{$key}=\"{$val}\" " : '';
        }
        $attrStr = ' ' . trim($attrStr);

        $xml = "<{$verbStr}{$attrStr}";
        $noun = trim($noun);
        $xml .= (empty($noun)) ? ' />' : ">\n{$noun}\n</{$verbStr}>";
        return $xml;
    }

}