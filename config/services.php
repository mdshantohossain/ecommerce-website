<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */
    'google' => [
        'client_id' => '1024923659309-n3b56e97v4tf85sadnvac89p8gil5chj.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/google/callback',
    ],
    'facebook' => [
        'client_id' => '1096372914724976',
        'client_secret' => '95ec24fa304bed9a57a51137e7f4a4fe',
        'redirect' => 'http://127.0.0.1:8000/facebook/callback',
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
