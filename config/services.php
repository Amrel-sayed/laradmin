<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    
    'google' => [
    'client_id' => '387437616722-4pdnutfgiarvbjdovharmabqf5j4tell.apps.googleusercontent.com',         // Your GitHub Client ID
    'client_secret' => 'cCNZ4y1j0cZcAD9J6l5ofGIG', // Your GitHub Client Secret
    'redirect' => 'http://127.0.0.1:2000/login/google/callback',
    ], 

    'twitter' => [
    'client_id' => 'sHben7V3DNi8Y3ZZdONfFMejW',         // Your GitHub Client ID
    'client_secret' => 'meduGhV3xm51aXKhTiWJQs92ESQF6XGatdCswQgYHDKA0lDK5p
', // Your GitHub Client Secret
    'redirect' => 'http://127.0.0.1:2000/login/twitter/callback',
    ],   

     'facebook' => [
    'client_id' => '144909339516563',         // Your GitHub Client ID
    'client_secret' => 'ec788f503305383721d3646cd90d1a8f', // Your GitHub Client Secret
    'redirect' => 'http://localhost:2000/login/facebook/callback',
    ],

];
