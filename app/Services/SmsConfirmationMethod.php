<?php

namespace App\Services;

use App\Interfaces\ConfirmationMethodInterface;
use App\Models\ConfirmationCode;
use Illuminate\Support\Facades\Http;

class SmsConfirmationMethod implements ConfirmationMethodInterface
{
    public function sendCode(ConfirmationCode $code)
    {
        Http::post('https://api.sms-service.com/send', [
            'phone' => $code->user->phone,
            'message' => 'Ваш код подтверждения: ' . $code->code,
        ]);
    }

    public function verifyCode(ConfirmationCode $code)
    {
        
    }
}