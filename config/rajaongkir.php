<?php

return [

	/*
    |--------------------------------------------------------------------------
    | End Point Api ( Konfigurasi Server Akun )
    |--------------------------------------------------------------------------
    |
    | Starter : http://rajaongkir.com/api/starter
    | Basic : http://rajaongkir.com/api/basic
    | Pro : http://pro.rajaongkir.com/api
    |
    */

	'end_point_api' => env('RAJAONGKIR_ENDPOINTAPI', 'http://rajaongkir.com/api/starter'),

	/*
    |--------------------------------------------------------------------------
    | Api key
    |--------------------------------------------------------------------------
    |
    | Isi dengan api key yang didapatkan dari rajaongkir
    |
    */

	'api_key' => env('RAJAONGKIR_APIKEY', 'b41ae2958a1bdb7092996431de3ea1ae'),
    'fallback_fee'=>env('RAJAONGKIR_FALLBACK_FEE', 4000),
    'origin'=>env('RAJAONGKIR_REGENCY_ORIGIN', 3), //KOTA CILEGON
    'courier'=>env('RAJAONGKIR_COURIER','jne'),
    'service'=>env('RAJAONGKIR_SERVICE', 'REG')
];
