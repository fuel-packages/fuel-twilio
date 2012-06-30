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

abstract class Twilio_Twiml_Verb {

    /**
     * @var string Stores the element noun 
     */
    protected $noun = '';

    /**
     * @var boolean Does the element have a noun
     */
    protected $has_noun = true;

    /**
     * @var array Stores the element attributes
     */
    protected $attr = array();

    /**
     * @var array Stored default attributes
     */
    protected $default = array();

    /**
     * @var boolean Does the element has nested objects
     */
    protected $has_nested = false;

    /**
     * @var array Stored default attributes
     */
    protected $allowed_nested = array();

    /**
     * Twilio_Twiml constructor 
     * 
     * @param array $attr An array of attributes for the element
     * @param mixed $noun Either a string or an array of nested objects
     */
    public function __construct($attr = array(), $noun = '') {
        $this->noun = $noun;
        $this->attr = $attr;
    }

    /**
     * Executes render method, return the results 
     * 
     * @return string An Twiml document
     */
    public function __toString() {
        return $this->render();
    }

    /**
     * Renders the Twiml document
     * 
     * @return string An Twiml document
     */
    public function render() {
        \Config::load('twilio', true);
        $verb = str_replace('Twilio\\Twilio_Twiml_', '', get_called_class());
        $attrStr = '';
        $config = \Config::get('twilio.tmiml.' . strtolower($verb));
        $attr = array_merge($this->default, $config);
        if (is_array($this->attr))
            $attr = array_merge($attr, $this->attr);

        if (count($attr) > 0) {
            foreach ($this->default as $key => $val) {
                $val = (isset($attr[$key])) ? $attr[$key] : $val;
                $attrStr .= (!empty($val)) ? "{$key}=\"{$val}\" " : '';
            }
            $attrStr = trim($attrStr);
            $attrStr = (!empty($attrStr)) ? ' ' . $attrStr : '';
        }
        $xml = "<{$verb}{$attrStr}";
        $xml .= (!$this->has_noun) ? ' />' : ">{$this->noun}</{$verb}>";
        return $xml;
    }

}