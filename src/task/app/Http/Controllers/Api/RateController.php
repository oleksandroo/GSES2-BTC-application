<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ApiRequestService;

class RateController extends Controller
{

    public function rate()
    {
        $currentRate = ApiRequestService::makeRequest(config('task.ApiRequest.url'), [
            'filter[code]' => 'btc'
        ]);
        if($currentRate === false) {
            return response('Invalid status value', 400)
                ->header('Content-Type', 'application/json');
        } else {
            return response($currentRate->data[0]->price->uah, 200)
                ->header('Content-Type', 'application/json');
        }
    }
}
