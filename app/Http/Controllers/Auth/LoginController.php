<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;

class LoginController extends Controller
{
    public function action(Request $request)
    {
        $response = ["is_auth" => false];
        $code = 403;
        $messages = [
            'required' => 'Поле :attribute обязательно.',
            'unique' => 'Значение поля :attribute уже занято.',
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            //'password' => $this->pass_gen(),
        ], $messages);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $response = ["is_auth" => True];
            $code = 200;
        }
        return response()->json($response, $code);
    }
}
