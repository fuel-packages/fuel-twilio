Twilio
======

Twilio is a package to allow interaction with the [Twilio](https://www.twilio.com) service. 

Installation
------------

1.	Clone (`git clone git://github.com/maca134/fuelphp-twilio`) / [download](https://github.com/maca134/fuelphp-twilio/zipball/master)
2.	Copy to fuel/packages/
4.	Copy fuel/packages/twilio/config/twilio.php to fuel/app/config/
5.	Add your Twilio credentials and defaults for each twiml element.

# Introduction

## Rest API

This package will allow you to send requests to Twilio:

- [Accounts](https://www.twilio.com/docs/api/rest/account)
- [MakeCall](https://www.twilio.com/docs/api/rest/making-calls)
- [Recordings](https://www.twilio.com/docs/api/rest/recording)
- [SmsMessage](https://www.twilio.com/docs/api/rest/sending-sms)
- [Transcriptions](https://www.twilio.com/docs/api/rest/transcription)

## [TwiML](https://www.twilio.com/docs/api/twiml): Twilio Markup Language

It also includes an object based implementation of Twilio's [TwiML](https://www.twilio.com/docs/api/twiml).

Here are the TwiML elements:

* [Say](https://www.twilio.com/docs/api/2010-04-01/twiml/say)
* [Play](https://www.twilio.com/docs/api/2010-04-01/twiml/play)
* [Gather](https://www.twilio.com/docs/api/2010-04-01/twiml/gather)
	* [Say](https://www.twilio.com/docs/api/2010-04-01/twiml/say)
	* [Play](https://www.twilio.com/docs/api/2010-04-01/twiml/play)
	* [Pause](https://www.twilio.com/docs/api/2010-04-01/twiml/pause)
* [Record](https://www.twilio.com/docs/api/2010-04-01/twiml/record)
* [Sms](https://www.twilio.com/docs/api/2010-04-01/twiml/sms)
* [Dial](https://www.twilio.com/docs/api/2010-04-01/twiml/dial)
	* [Number](https://www.twilio.com/docs/api/2010-04-01/twiml/number)
	* [Client](https://www.twilio.com/docs/api/2010-04-01/twiml/client)
	* [Conference](https://www.twilio.com/docs/api/2010-04-01/twiml/conference)
* [Hangup](https://www.twilio.com/docs/api/2010-04-01/twiml/hangup)
* [Redirect](https://www.twilio.com/docs/api/2010-04-01/twiml/redirect)
* [Reject](https://www.twilio.com/docs/api/2010-04-01/twiml/reject)
* [Pause](https://www.twilio.com/docs/api/2010-04-01/twiml/pause)

# Configuration

Copy config/twilio.php to app/config/twilio.php and change whatever setting in need of changing.

# Rest API Examples

## Make a call

	$call = Twilio\Twilio::request('MakeCall');
	$response = $call->create(array(
		'To' => '+4412345678901',
		'From' => '+4416789012345',
		'Url' => Uri::create('welcome/call')
	));

## Send an SMS message

	$sms = Twilio\Twilio::request('SmsMessage');
	$response = $sms->create(array(
		'To' => '+4412345678901',
		'From' => '+4416789012345',
		'Body' => 'SMS content'
	));
	
# TwiML Examples

## Simple Example

	$twiml = Twilio\Twilio::twiml();
	$twiml->say('Hello World!')->pause('', array('length' => '5'));
	$twiml->render();

Will render:

	<?xml version="1.0" encoding="UTF-8" ?>
		<Response>
			<Say voice="man" language="en" loop="1">Hello World!</Say>
			<Pause loop="5" />
		</Gather>
	</Response>

## Grabbing key presses during a call

	$question = Twilio\Twilio::twiml();
	$question->say('Please press 1 or 2')->pause()->play('http://some.place.com/music.mp3');

	$twiml = Twilio\Twilio::twiml();
	$twiml->pause()->gather($question, array(
		'action' => Uri::create('twilio/next_action'),
		'numDigits' => '1'
			)
	);
	$response = $twiml->render();

## Sending an SMS message

	$twiml = Twilio\Twilio::twiml();
	$twiml->sms($message, array('from' => '+441234567890'));

# Notes

Only the TwiML elements Gather and Dial have nested objects.

Gather can have the following nested variables:

- Say
- Play
- Pause

Dial can have:

- A string, telephone number
- Number
- Client
- Conference

# Get In Touch

You can get in touch either through GitHub or you can email me at [maca134@googlemail.com](mailto:maca134@googlemail.com).

Checkout my site at [http://maca134.co.uk](maca134.co.uk)

# Thanks

 - [Twilio](https://www.twilio.com)
 - [TinyHttp](https://gist.github.com/618157)