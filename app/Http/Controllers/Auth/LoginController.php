<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\error;

class LoginController extends Controller
{
    public function action(Request $request)
    {
        $response = [];
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
            return json_encode(["error" => "welcome"], JSON_PRETTY_PRINT);
        }
        return json_encode(["error" => "no logging in"], JSON_PRETTY_PRINT);
    }
}
