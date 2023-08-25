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
        $data = $request->all();
        if (Auth::attempt(['email' => $data["email"], 'password' => $data['password']], true)) {
            $request->session()->regenerate();
            $response = ["is_auth" => True];
            $response["user"] = Auth::user();
            $response["auth_token"] = Session::getID();
            $code = 200;
        }
        //return redirect()->route('main', ['response' => $response, "code" => $code]);

        return response()->json($response, $code);
    }
}
