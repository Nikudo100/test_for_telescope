<?php

namespace App\Services;

use App\Interfaces\ConfirmationMethodInterface;
use App\Models\ConfirmationCode;
use Illuminate\Support\Facades\Mail;

class EmailConfirmationMethod implements ConfirmationMethodInterface
{
    public function sendCode(ConfirmationCode $code)
    {
        Mail::to($code->user->email)->send($code);
    }
    
    public function verifyCode(ConfirmationCode $code)
    {
        
    }
}