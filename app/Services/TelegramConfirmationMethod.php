<?php

namespace App\Services;

use App\Interfaces\ConfirmationMethodInterface;
use App\Models\ConfirmationCode;
use Illuminate\Support\Facades\Http;

class TelegramConfirmationMethod implements ConfirmationMethodInterface
{
    public function sendCode(ConfirmationCode $code)
    {
        Http::post('https://api.telegram.org/bot' . env('TELEGRAM_BOT_TOKEN') . '/sendMessage', [
            'chat_id' => $code->user->telegram_id,
            'text' => 'Ваш код подтверждения: ' . $code->code,
        ]);
    }

    public function verifyCode(ConfirmationCode $code)
    {

    }
}