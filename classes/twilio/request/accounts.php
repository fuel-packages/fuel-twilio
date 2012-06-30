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

    protected $defaults = array();
    protected $res = '/2010-04-01/Accounts/%s.json';

    public function create($attr = array()) {
        $res = sprintf($this->res, \Config::get('twilio.account_sid'));
        return $this->send($res, '', 'GET');
    }

}