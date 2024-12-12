<?php

namespace App\Http\Controllers;

use App\Interfaces\ConfirmationMethodInterface;
use App\Models\ConfirmationCode;
use App\Models\ConfirmationMethod;
use App\Models\User;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{

    public function index()
    {
        return view('confirmation');
    }

    public function sendCode(Request $request, User $user, ConfirmationMethod $method)
    {
        $code = ConfirmationCode::create([
            'user_id' => $user->id,
            'method_id' => $method->id,
            'code' => str_random(6),
        ]);

        $method->sendCode($code);

        return response()->json(['message' => 'Код отправлен']);
    }

    public function verifyCode(Request $request, User $user, ConfirmationMethod $method, ConfirmationCode $code)
    {
        $method->verifyCode($code);

        return response()->json(['message' => 'Код подтвержден']);
    }
}
