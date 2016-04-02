<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],


    'google' => [
        'client_id' => '1094541323883-7ebd5pr8bpkabbi5ii1ve35flvonhm54.apps.googleusercontent.com',
        'client_secret' => 'Ss7vKMrxdmnQEKA-o6cIx5ep',
        'redirect' => 'http://chic-cheap.ir/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => '552428908270778',
        'client_secret' => '183864f8b3219dd390486da4a38ec47a',
        'redirect' => 'http://chic-cheap.ir/auth/facebook/callback',
    ],
    'linkedin' => [
        'client_id' => '77l6ruao7ri50h',
        'client_secret' => 'FPtVeB6352xctFXE',
        'redirect' => 'http://chic-cheap.ir/auth/linkedin/callback',
    ],

];

