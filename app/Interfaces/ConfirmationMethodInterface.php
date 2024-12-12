<?php

namespace App\Interfaces;

use App\Models\ConfirmationCode;

interface ConfirmationMethodInterface
{
    public function sendCode(ConfirmationCode $code);
    public function verifyCode(ConfirmationCode $code);
}