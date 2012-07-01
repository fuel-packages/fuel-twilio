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

class Twilio_Request_MakeCall extends Twilio_Request implements Twilio_Request_Base {

    /**
     * @var array Stored default attributes
     */
    protected $defaults = array(
        'From' => '',
        'To' => '',
        'Url' => '',
        'ApplicationSid' => false,
        'Method' => 'POST',
        'FallbackUrl' => false,
        'FallbackMethod' => false,
        'StatusCallback' => false,
        'StatusCallbackMethod' => false,
        'SendDigits' => false,
        'IfMachine' => false,
        'Timeout' => false,
        'Record' => false,
    );

    /**
     * @var string Stores Request URI
     */
    protected $res = '/2010-04-01/Accounts/%s/Calls.json';

    /**
     * Executes the request, returning the response
     * 
     * @param array $attr An associative array of attributes for the request
     * @return stdClass An json_decoded object of the response 
     */
    public function create($attr = array()) {
        $res = sprintf($this->res, \Config::get('twilio.account_sid'));
        $body = $this->create_post($attr);
        return $this->send($res, $body);
    }

}