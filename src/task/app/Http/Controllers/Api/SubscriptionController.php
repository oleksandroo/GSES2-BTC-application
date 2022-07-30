<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ApiRequestService;
use App\Services\EmailService;
use App\Services\MailService;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $addNewEmailSuccessfully = EmailService::addNewEmail(config('task.mailsFile'), $request->get('email'));
        if($addNewEmailSuccessfully) {
            return response('E-mail додано', 200)
                ->header('Content-Type', 'application/json');
        } else {
            return response('e-mail вже є в базі даних (файловій)', 409)
                ->header('Content-Type', 'application/json');
        }
    }

    public function sendEmails()
    {
        $mails = EmailService::getAllEmails();
        $currentRate = ApiRequestService::makeRequest(config('task.ApiRequest.url'), ['filter[code]' => 'btc']);
        if($currentRate === false) {
            return response('Invalid status value', 400)
                ->header('Content-Type', 'application/json');
        } else {
            MailService::sendToAll($mails, $currentRate->data[0]->price->uah);
            return response('E-mailʼи відправлено', 200)
                ->header('Content-Type', 'application/json');
        }
    }
}
