<?php

add_action('rest_api_init', function () {
    register_rest_route('np/v1', '/regions', [
        'methods' => 'GET',
        'callback' => 'get_nova_poshta_regions',
        'permission_callback' => '__return_true',
    ]);

    register_rest_route('np/v1', '/cities', [
        'methods' => 'GET',
        'callback' => 'get_nova_poshta_cities',
        'permission_callback' => '__return_true',
        'args' => [
            'region_ref' => ['required' => true]
        ]
    ]);

    register_rest_route('np/v1', '/warehouses', [
        'methods' => 'GET',
        'callback' => 'get_nova_poshta_warehouses',
        'permission_callback' => '__return_true',
        'args' => [
            'city_ref' => ['required' => true]
        ]
    ]);
});

function get_nova_poshta_regions() {
    return nova_poshta_api_request('getAreas', new stdClass());
}

function get_nova_poshta_cities($request) {
    $region_ref = $request->get_param('region_ref');
    return nova_poshta_api_request('getCities', ['AreaRef' => $region_ref]);
}

function get_nova_poshta_warehouses($request) {
    $city_ref = $request->get_param('city_ref');
    return nova_poshta_api_request('getWarehouses', ['CityRef' => $city_ref]);
}

function nova_poshta_api_request($method, $params) {
    $api_key = env('API_KEY_NP');

    $payload = [
        'apiKey' => $api_key,
        'modelName' => 'Address',
        'calledMethod' => $method,
        'methodProperties' => $params
    ];

    $response = wp_remote_post('https://api.novaposhta.ua/v2.0/json/', [
        'body' => json_encode($payload),
        'headers' => ['Content-Type' => 'application/json'],
        'timeout' => 10,
    ]);

    $raw = wp_remote_retrieve_body($response);
    $data = json_decode($raw);
    return $data->data;
}
