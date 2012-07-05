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
Autoloader::add_core_namespace('Twilio');

Autoloader::add_classes(array(
    'Twilio\\Twilio'						=> __DIR__ . '/classes/twilio.php',
    'Twilio\\Twilio_Twiml'					=> __DIR__ . '/classes/twilio/twiml.php',
    'Twilio\\Twilio_Twiml_Gather'			=> __DIR__ . '/classes/twilio/twiml/gather.php',
    'Twilio\\Twilio_Twiml_Hangup'			=> __DIR__ . '/classes/twilio/twiml/hangup.php',
    'Twilio\\Twilio_Twiml_Pause'			=> __DIR__ . '/classes/twilio/twiml/pause.php',
    'Twilio\\Twilio_Twiml_Play'				=> __DIR__ . '/classes/twilio/twiml/play.php',
    'Twilio\\Twilio_Twiml_Record' 			=> __DIR__ . '/classes/twilio/twiml/record.php',
    'Twilio\\Twilio_Twiml_Redirect'			=> __DIR__ . '/classes/twilio/twiml/redirect.php',
    'Twilio\\Twilio_Twiml_Reject'			=> __DIR__ . '/classes/twilio/twiml/reject.php',
    'Twilio\\Twilio_Twiml_Say'				=> __DIR__ . '/classes/twilio/twiml/say.php',
    'Twilio\\Twilio_Twiml_Sms'				=> __DIR__ . '/classes/twilio/twiml/sms.php',
    'Twilio\\Twilio_Twiml_Verb'				=> __DIR__ . '/classes/twilio/twiml/verb.php',
    'Twilio\\Twilio_Twiml_Dial'				=> __DIR__ . '/classes/twilio/twiml/dial.php',
    'Twilio\\Twilio_Twiml_Client'			=> __DIR__ . '/classes/twilio/twiml/client.php',
    'Twilio\\Twilio_Twiml_Conference'		=> __DIR__ . '/classes/twilio/twiml/conference.php',
    'Twilio\\Twilio_Twiml_Number'			=> __DIR__ . '/classes/twilio/twiml/number.php',
    'Twilio\\Twilio_Twiml_Nest'				=> __DIR__ . '/classes/twilio/twiml/nest.php',
    'Twilio\\Twilio_Request'				=> __DIR__ . '/classes/twilio/request.php',
    'Twilio\\Twilio_Request_TinyHttp'		=> __DIR__ . '/classes/twilio/request/tinyhttp.php',
    'Twilio\\Twilio_Request_Base'			=> __DIR__ . '/classes/twilio/request/base.php',
    'Twilio\\Twilio_Request_SmsMessage'		=> __DIR__ . '/classes/twilio/request/smsmessage.php',
    'Twilio\\Twilio_Request_MakeCall'		=> __DIR__ . '/classes/twilio/request/makecall.php',
    'Twilio\\Twilio_Request_Accounts'		=> __DIR__ . '/classes/twilio/request/accounts.php',
    'Twilio\\Twilio_Request_Recordings'		=> __DIR__ . '/classes/twilio/request/recordings.php',
    'Twilio\\Twilio_Request_Transcriptions'	=> __DIR__ . '/classes/twilio/request/transcriptions.php',
));
