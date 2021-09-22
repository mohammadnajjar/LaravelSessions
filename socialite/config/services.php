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
    'facebook' => [
        'client_id' => '849852242373127',
        'client_secret' => '92b0421a366e3195d4cb6b89c7ad8249',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],
    'github' => [
        'client_id' => '3809af8d2c4113cb8fb9',
        'client_secret' => '34182800b5af34706ca99e9d3196326448c574e6',
        'redirect' => 'http://localhost:8000/login/github/callback',
    ],
    'google' => [
        'client_id' => '910969274721-in8m2u4mlsncganm2o5qoe98c83sr2e7.apps.googleusercontent.com',
        'client_secret' => 'ipLkgirfYIY1XXr8eWFqMVqL',
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],
];
