<?php

return [
    'form_url' => env('FIRSTDATA_FORM_URL','https://test.ipg-online.com/connect/gateway/processing'),
    'store_id' => env('FIRSTDATA_STORE_ID',''),
    'shared_secret' => env('FIRSTDATA_SHARED_SECRET',''),
    'response_success' => env('FIRSTDATA_RESPONSE_SUCCESS','https://your-site/first-data/response/success'),
    'response_failure' => env('FIRSTDATA_RESPONSE_FAILURE','https://your-site/first-data/response/failure'),
    'response_notification' => env('FIRSTDATA_RESPONSE_NOTIFICATION','https://your-site/first-data/response/notification'),
    'timezone' => env('FIRSTDATA_TIMEZONE','America/Buenos_Aires')
];
