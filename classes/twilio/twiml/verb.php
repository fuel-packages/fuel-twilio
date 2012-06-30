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

    protected $noun = '';
    protected $has_noun = true;
    protected $attr = array();
    protected $default = array();
    protected $has_nested = false;
    protected $allowed_nested = array();

    public function __construct($attr = array(), $noun = '') {
        $this->noun = $noun;
        $this->attr = $attr;
    }

    public function __toString() {
        return $this->render();
    }

    public function render() {
        \Config::load('twilio', true);
        $verb = str_replace('Twilio\\Twilio_Twiml_', '', get_called_class());
        $attrStr = '';
        $config = \Config::get('twilio.tmiml.' . strtolower($verb));
        $attr = array_merge($this->default, $config);
        if (is_array($this->attr)) $attr = array_merge($attr, $this->attr);

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