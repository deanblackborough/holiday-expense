<?php

$key_api_resource_type_id = 'API_RESOURCE_TYPE_ID';
$key_api_resource_id = 'API_RESOURCE_ID';

return [
    'api_base_url' => 'https://api.costs-to-expect.com/v1/',

    'api_uri_sign_in' => 'auth/login',

    'api_resource_type_id' => env($key_api_resource_type_id, null),
    'api_resource_id' => env($key_api_resource_id, null),

    'api_uri_summary_categories_expanded' => 'resource_types/' .
        env($key_api_resource_type_id, null) . '/resources/' .
        env($key_api_resource_id, null) . '/expanded_summary/categories',

    'version' => 'v1.00.0',
    'release_date' => '[Development]'
];
