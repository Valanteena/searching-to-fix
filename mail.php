<?php
// If you are using Composer
require '../../vendor/autoload.php';

$apiKey = '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';
$sg = new \SendGrid($apiKey);

////////////////////////////////////////////////////
// Create a batch ID #
// POST /mail/batch #

$response = $sg->client->mail()->batch()->post();
echo $response->statusCode();
echo $response->body();
echo $response->headers();

////////////////////////////////////////////////////
// Validate batch ID #
// GET /mail/batch/{batch_id} #

$batch_id = "ZGY0ZGViYzItNWFmZS0xMWU3LWEyNzgtNTI1NDAwYTUxOTdhLTA5Y2VlMjM1MQ";
$response = $sg->client->mail()->batch()->_($batch_id)->get();
echo $response->statusCode();
echo $response->body();
echo $response->headers();

////////////////////////////////////////////////////
// v3 Mail Send #
// POST /mail/send #
// This endpoint has a helper, check it out [here](https://github.com/sendgrid/sendgrid-php/blob/master/lib/helpers/mail/README.md).
$request->setHeaders(array(
'content-type' => 'application/json',
));

$request_body = json_decode('{  
  
  "content": [ { "type": "type": "text/html", "value": "<html><p>Hello, world!</p></html>" } ], 
    "from": {
    "email": "vankat@localbiznetwork.com", 
    "name": "Vankat"
  }, 
  "headers": {}, 
  "ip_pool_name": "[YOUR POOL NAME GOES HERE]", 
  "mail_settings": {
    "bcc": {
      "email": "valandeena.m@gmail.com", 
      "enable": true
    }, 
    "bypass_list_management": {
      "enable": true
    }, 
    "footer": {
      "enable": true, 
      "html": "<p>Thanks</br>The SendGrid Team</p>", 
      "text": "Thanks,/n The SendGrid Team"
    }, 
    "sandbox_mode": {
      "enable": false
    }, 
    "spam_check": {
      "enable": true, 
      "post_to_url": "http://example.com/compliance", 
      "threshold": 3
    }
  }, 
  "personalizations": [
    {
      "bcc": [
        {
           "email": "valandeena.m@gmail.com", 
		   "name": "Teena"
        },
		{
			"email": "unmai.m@gmail.com"
			"name": "Unmai"
		},
		{
			"email": "valanteena.lbn@gmail.com"
			"name": "Valanteena Mareesan"
		},
      ], 
      "cc": [
        {
          "email": "valanteena.lbn@gmail.com", 
          "name": "Valanteena"
        }
      ], 
      "custom_args": {
        "New Argument 1": "New Value 1", 
        "activationAttempt": "1", 
        "customerAccountNumber": "[CUSTOMER ACCOUNT NUMBER GOES HERE]"
      }, 
      "headers": {
        "X-Accept-Language": "en", 
        "X-Mailer": "MyApp"
      }, 
      "send_at": 1409348513, 
      "subject": "Hello, World!", 
      "substitutions": {
        "id": "substitutions", 
        "type": "object"
      }, 
      "to": [
        {
          "email": "valandeena.m@gmail.com", 
          "name": "Vaalu"
        }
      ]
    }
  ], 
  "reply_to": {
    "email": "venkat@localbiznetwork.com", 
    "name": "Venkat Ram"
  }, 
  "sections": {
    "section": {
      ":sectionName1": "section 1 text", 
      ":sectionName2": "section 2 text"
    }
  }, 
  "send_at": 1409348513, 
  "subject": "Hello, World!", 
  "template_id": "[YOUR TEMPLATE ID GOES HERE]", 
  "tracking_settings": {
    "click_tracking": {
      "enable": true, 
      "enable_text": true
    }, 
    "ganalytics": {
      "enable": true, 
      "utm_campaign": "[NAME OF YOUR REFERRER SOURCE]", 
      "utm_content": "[USE THIS SPACE TO DIFFERENTIATE YOUR EMAIL FROM ADS]", 
      "utm_medium": "[NAME OF YOUR MARKETING MEDIUM e.g. email]", 
      "utm_name": "[NAME OF YOUR CAMPAIGN]", 
      "utm_term": "[IDENTIFY PAID KEYWORDS HERE]"
    }, 
    "open_tracking": {
      "enable": true, 
      "substitution_tag": "%opentrack"
    }, 
    "subscription_tracking": {
      "enable": true, 
      "html": "If you would like to unsubscribe and stop receiving these emails <% clickhere %>.", 
      "substitution_tag": "<%click here%>", 
      "text": "If you would like to unsubscribe and stop receiveing these emails <% click here %>."
    }
  }
}');
$response = $sg->client->mail()->send()->post($request_body);
echo $response->statusCode();
echo $response->body();
echo $response->headers();

