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

class Twilio_Request_Transcriptions extends Twilio_Request implements Twilio_Request_Base
{
    /**
     * @var array Stored default attributes
     */
    protected $defaults = array(
        'Sid' => false,
        'RecordingSid' => false,
        'DateCreated' => false,
        'Page' => false,
        'PageSize' => 50
    );

    /**
     * @var string Stores Request URI
     */
    protected $res = '/2010-04-01/Accounts/%s/Transcriptions%s.json';

    /**
     * Executes the request, returning the response
     *
     * @param  array    $attr An associative array of attributes for the request
     * @return stdClass An json_decoded object of the response
     */
    public function create($attr = array())
    {
        $sid = (!empty($attr['Sid'])) ? '/' . $attr['Sid'] : '';
        $accoundsid = \Config::get('twilio.account_sid');
        $accoundsid .= (!empty($attr['RecordingSid'])) ? '/Recordings/' . $attr['RecordingSid'] : '';
        $res = sprintf($this->res, $accoundsid, $sid, '');
        unset($attr['Sid'], $attr['RecordingSid']);
        $body = $this->create_post($attr);
        $response = $this->send($res, $body, 'GET');

        return $response;
    }

}
