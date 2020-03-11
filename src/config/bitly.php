<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Bitly Api Base URL
    |--------------------------------------------------------------------------
    |
    | https://api-ssl.bitly.com/v4
    */

    'url' => env('BITLY_BASE_API_URL','https://api-ssl.bitly.com/v4'),

    /*
    |--------------------------------------------------------------------------
    | Access Token ( Generic Access Token )
    |--------------------------------------------------------------------------
    |
    | Enter here your access token generated from: https://bitly.com/a/oauth_apps
    */

    'access_token' => env('BITLY_ACCESS_TOKEN')
];
