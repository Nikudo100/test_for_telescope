<?php

namespace App\Http\Controllers;

use App\Interfaces\ConfirmationMethodInterface;
use App\Models\ConfirmationCode;
use App\Models\ConfirmationMethod;
use App\Models\User;
use App\Http\Requests\ConfirmationCodeSendRequest;
use App\Http\Requests\ConfirmationCodeRequest;

class ConfirmationController extends Controller
{

    public function index()
    {
        return view('confirmation');
    }

    public function sendCode(ConfirmationCodeSendRequest $request, ConfirmationMethodInterface $service)
    {
        $req = $request->validate();
        
        $code = ConfirmationCode::create([
            'user_id' => $request->user->id,
            'method_id' => $req['method_id'],
            'code' => str_random(6),
        ]);

        $service->sendCode($code);

        return response()->json(['message' => 'Код отправлен']);
    }

    public function verifyCode(ConfirmationCodeRequest $request, ConfirmationMethodInterface $service)
    {
        $req = $request->validate();

        $code = ConfirmationCode::where('code', $req['code'])->where('method_id', $req['method_id'])->first();
        
        $service->verifyCode($code);
        
        return response()->json(['message' => 'Код подтвержден']);
    }
}
