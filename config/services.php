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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],







    'paypal' => [
        'id' => env('PAYPAL_ID'),
        'secret' => env('PAYPAL_SECRET'),
        'url' =>[
            'redirect' => 'http://127.0.0.1:8000/front/execute-payment',
            'cancel' => 'http://127.0.0.1:8000/front/cancle',
        ]
    ],








    'facebook' => [
        'client_id'     => '730043884089894',
        'client_secret' => 'a97a64422ca45a3968cd05422d3d2272',
        'redirect'      => 'http://127.0.0.1:8000/auth/facebook/callback',

    ],


    'google' => [
        'client_id' => '602776868055-41jneukb96d0sea5q6gj7h96s3gr14r7.apps.googleusercontent.com',
        'client_secret' => 'vsXdkiiCg8B69fSfnYxUIbjt',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',
    ],

];
