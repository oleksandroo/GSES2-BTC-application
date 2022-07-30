<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiRequestService
{

    public static function makeRequest(string $link, array $queryParams = [])
    {
        $response = Http::get($link, $queryParams);
        if($response->successful()) {
            return $response->object();
        }
        return false;
    }
}
