эъ<?php

namespace App\Interfaces;

use App\Models\ConfirmationCode;

interface ConfirmationMethodSendInterface
{
    public function sendCode(ConfirmationCode $code);

    public function verifyCode(ConfirmationCode $code);
}