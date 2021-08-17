<?php


namespace App\Http\Lib\Helpers;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class GeneralHelpers
{

    /**
     * @param $name
     * @param $email
     * @param $phone
     * @param $message
     */
    public static function sendMail($name, $email, $phone, $message)
    {
        $data = [
            'name'=>(string)$name,
            'email' =>(string) $email,
            'phone' =>(string) $phone,
            'msg' => (string)$message
        ];
        $to_email = Config::get('mail.from.address');
        $to_name = Config::get('mail.from.name');
        Mail::send('mailTemplates.newMessageTemplate', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('New message from form');
            $message->from(Config::get('mail.from.address'), Config::get('mail.from.name'));
        });
    }
}
