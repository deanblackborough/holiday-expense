<?php

$key_api_resource_type_id = 'API_RESOURCE_TYPE_ID';
$key_api_resource_id = 'API_RESOURCE_ID';

return [
    'api_base_url' => 'https://api.costs-to-expect.com/v1/',

    'api_uri_sign_in' => 'auth/login',

    'api_resource_type_id' => env($key_api_resource_type_id, null),
    'api_resource_id' => env($key_api_resource_id, null),

    'version' => 'v1.00.0',
    'release_date' => '[Development]'
];
