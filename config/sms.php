<?php

/**
 * Simple-SMS
 * Simple-SMS is a package made for Laravel to send/receive (polling/pushing) text messages.
 *
 * @link http://www.simplesoftware.io
 * @author SimpleSoftware support@simplesoftware.io
 *
 */

/*
    |--------------------------------------------------------------------------
    | Simple SMS
    |--------------------------------------------------------------------------
    | Driver
    |   Email:  The Email driver uses the Illuminate\Mail\Mailer instance to
    |           send SMS messages based on the carriers e-mail to SMS gateways.
    |           The Email driver will send messages out based on your Laravel
    |           mail settings.
    |   Twilio: https://www.twilio.com/
    |   EzTexting: https://www.eztexting.com/
    |   CallFire: https://www.callfire.com/
    |   Mozeo: https://www.mozeo.com/
    |--------------------------------------------------------------------------
    | From
    |   Email:  The from address must be a valid email address.
    |   Twilio: The from address must be a verified phone number within Twilio.
    |--------------------------------------------------------------------------
    | Twilio Additional Settings
    |   Account SID:  The Account SID associated with your Twilio account.
    |   Auth Token:   The Auth Token associated with your Twilio account.
    |   Verify:       Ensures extra security by checking if requests
    |                 are really coming from Twilio.
    |
    |--------------------------------------------------------------------------
    | EZTexting Additional Settings
    |   Username:  Your login username.
    |   Password:  Your login password.
    |--------------------------------------------------------------------------
    | CallFire
    |   App Login:     Your login settings. (https://www.callfire.com/ui/manage/access)
    |   App Password:  Your login password. (https://www.callfire.com/ui/manage/access)
    |--------------------------------------------------------------------------
    | Mozeo
    | Company Key:  Your company key. (https://www.mozeo.com/mozeo/customer/platformdetails.php)
    | Username:     Your username.  (https://www.mozeo.com/mozeo/customer/platformdetails.php)
    | Password:     Your password.  (https://www.mozeo.com/mozeo/customer/platformdetails.php)

*/
return [
    'driver' => 'twilio',
    'from' => '+16193206871', //Your Twilio Number in E.164 Format.
    'twilio' => [
        'account_sid' => 'ACf214907e1cae31194d420857ed123efc',
        'auth_token' => 'dfa08bc8f228e58024affd56184b2937',
        'verify' => false,  //Used to check if messages are really coming from Twilio.
    ]

];