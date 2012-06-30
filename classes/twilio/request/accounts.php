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

class Twilio_Request_Accounts extends Twilio_Request implements Twilio_Request_Base {

    /**
     * @var array Stored default attributes
     */
    protected $defaults = array();

    /**
     * @var string Stores Request URI
     */
    protected $res = '/2010-04-01/Accounts/%s.json';

    /**
     * Executes the request, returning the response
     * 
     * @param array $attr An associative array of attributes for the request
     * @return type 
     */
    public function create($attr = array()) {
        $res = sprintf($this->res, \Config::get('twilio.account_sid'));
        return $this->send($res, '', 'GET');
    }

}