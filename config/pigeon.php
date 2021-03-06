<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Pigeon API base URI
    |--------------------------------------------------------------------------
    |
    */

    'base_uri' => env('PIGEON_BASE_URI', 'https://api.pigeonapp.io/v1/'),

    /*
    |--------------------------------------------------------------------------
    | Pigeon API Private Key
    |--------------------------------------------------------------------------
    |
    */

    'private_key' => env('PIGEON_PRIVATE_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Pigeon API Public Key
    |--------------------------------------------------------------------------
    |
    */

    'public_key' => env('PIGEON_PUBLIC_KEY', ''),
];
