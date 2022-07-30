<?php


namespace App\Services;


use Illuminate\Support\Facades\Storage;

class EmailService
{
    public static function addNewEmail(string $file, $content)
    {
        if(Storage::disk('local')->exists($file)) {
            $mails = json_decode(Storage::disk('local')->get($file));
        } else {
            $mails = [];
        }
        if(in_array($content, $mails)){
            return false;
        } else {
            $mails[] = $content;
            Storage::disk('local')->put($file, json_encode($mails));
            return true;
        }
    }

    public static function getAllEmails()
    {
        return json_decode(Storage::disk('local')->get('files/mails.txt'));
    }
}
