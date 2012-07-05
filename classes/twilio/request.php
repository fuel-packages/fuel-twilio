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

/**
 * Exception for Twilio_Request
 */
class Twilio_Request_Exception extends \FuelException {}

abstract class Twilio_Request
{
    /**
     * @var string Request user agent
     */
    private $useragent = 'fuel-twilio/0.1';

    /**
     * @var string Twilio api url
     */
    private $url = 'https://api.twilio.com';

    /**
     * @var string SSL certificate filename
     */
    private $cainfo = 'twilio_ssl_certificate.crt';

    /**
     * @var array Request headers
     */
    private $headers = array('Accept-Charset: utf-8');

    /**
     * @var Twilio_Request_TinyHttp TinyHTTP object
     */
    private $_http;

    /**
     * @var array Stored default attributes
     */
    protected $defaults = array();

    /**
     * @var string Stores Request URI
     */
    protected $res = '';

    /**
     * Returns a new Twilio_Request object
     *
     * @return Twilio_Request
     */
    public static function forge()
    {
        return new static();
    }

    /**
     * Twilio_Request constructor
     *
     * @throws Twilio_Request_Exception
     */
    public function __construct()
    {
        $this->cainfo = realpath(dirname(__FILE__) . '/../' . $this->cainfo);

        if (!in_array('curl', get_loaded_extensions())) {
            throw new Twilio_Request_Exception("It looks like you do not have curl installed.\n" .
                    "Curl is required to make HTTP requests using the twilio-php\n" .
                    "library. For install instructions, visit the following page:\n" .
                    "http://php.net/manual/en/curl.installation.php"
            );
        }
        $this->_http = new Twilio_Request_TinyHttp(
                        $this->url,
                        array("curlopts" => array(
                                CURLOPT_USERAGENT => $this->useragent,
                                CURLOPT_HTTPHEADER => $this->headers,
                                CURLOPT_CAINFO => $this->cainfo,
                        ))
        );
        \Config::load('twilio', true);
        $this->_http->authenticate(\Config::get('twilio.account_sid'), \Config::get('twilio.auth_token'));
    }

    /**
     * Sends the Twilio request
     *
     * @param  string                   $res
     * @param  string                   $body
     * @param  string                   $method
     * @return stdClass                 An json_decoded object of the response
     * @throws Twilio_Request_Exception
     */
    protected function send($res, $body = '', $method = 'POST')
    {
        $method = strtolower($method);
        if (!in_array($method, array('post', 'get', 'put', 'delete'))) {
            throw new Twilio_Request_Exception('Invalid http method');
        }
        if ($method == 'get') {
            $res .= (!empty($body)) ? '?' . $body : '';
            $body = '';
        }
        $response = $this->_http->$method($res, array(), $body);

        return json_decode($response[2]);
    }

    /**
     * Creates and returns a http query string
     *
     * @param  array  $attr An associative array of attributes
     * @return string A http query string
     */
    protected function create_post($attr = array())
    {
        $post = array();

        foreach ($this->defaults as $k => $v) {
            if (isset($attr[$k]))
                $v = $attr[$k];
            if ($v !== false) {
                $post[$k] = $v;
            }
        }

        return http_build_query($attr);
    }

}
