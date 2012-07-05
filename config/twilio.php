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
/**
 * NOTICE:
 *
 * If you need to make modifications to the default configuration, copy
 * this file to your app/config folder, and make them in there.
 *
 * This will allow you to upgrade fuel without losing your custom config.
 */
return array(
    'account_sid' => '',
    'auth_token' => '',
    'from' => '',
    /**
     * Default TwiML attributes
     */
    'tmiml' => array(
        'conference' => array(
            'muted' => 'false',
            'beep' => 'true',
            'startConferenceOnEnter' => 'true',
            'endConferenceOnExit' => 'false',
            'waitUrl' => '',
            'waitMethod' => 'POST',
            'maxParticipants' => '40',
        ),
        'dial' => array(
            'action' => '',
            'method' => 'POST',
            'timeout' => '30',
            'hangupOnStar' => 'false',
            'timeLimit' => '14400',
            'callerId' => '',
            'record' => 'false',
        ),
        'gather' => array(
            'action' => '',
            'method' => 'POST',
            'timeout' => 5,
            'finishOnKey' => '#',
            'numDigits' => ''
        ),
        'number' => array(
            'sendDigits' => '',
            'url' => ''
        ),
        'pause' => array(
            'length' => '1'
        ),
        'play' => array(
            'loop' => '1'
        ),
        'record' => array(
            'action' => '',
            'method' => 'POST',
            'timeout' => '5',
            'finishOnKey' => '1234567890*#',
            'maxLength' => '3600',
            'transcribe' => 'false',
            'transcribeCallback' => '',
            'playBeep' => 'true',
        ),
        'redirect' => array(
            'method' => 'POST'
        ),
        'reject' => array(
            'reason' => 'rejected'
        ),
        'say' => array(
            'voice' => 'man',
            'language' => 'en',
            'loop' => '1'
        ),
        'sms' => array(
            'to' => '',
            'from' => '',
            'action' => '',
            'method' => 'POST',
            'statusCallback' => '',
        )
    )
);
