<?php

return [
    /*
    |--------------------------------------------------------------------------
    | TwitterStreaming Configuration file
    |--------------------------------------------------------------------------
    |
    | Based TwitterStreaming you need to have already set your Twitter app
    | credentials.
    | You can create your app here:
    | https://apps.twitter.com/app/[YOUR_APP_ID]/keys
    |
    */
    'CONSUMER_KEY' => env('TWITTER_CONSUMER_KEY', ''),
    'CONSUMER_SECRET' => env('TWITTER_CONSUMER_SECRET', ''),
    'ACCESS_TOKEN' => env('TWITTER_ACCESS_TOKEN', ''),
    'ACCESS_TOKEN_SECRET' => env('TWITTER_ACCESS_TOKEN_SECRET', ''),
];