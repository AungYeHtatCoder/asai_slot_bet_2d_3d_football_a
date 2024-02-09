<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

Class ApiService{


    protected $baseUrl;

    public function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function get($endpoint, $params = [])
    {

        $url = $this->baseUrl . $endpoint;
       
        $response = Http::get($url, $params);

        return $response->json();
    }

}
