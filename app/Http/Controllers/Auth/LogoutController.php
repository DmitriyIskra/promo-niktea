<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;

class LogoutController extends Controller
{
    public function action(Request $request)
    {
        $response["is_auth"] = false;
        $response["user"] = false;
        $code = 403;
        if (auth()->check()) {
            $userToLogout = User::find(auth()->user()->id);
            auth()->setUser($userToLogout);
            $response["is_auth"] = True;
            $response["user"] = auth()->logout();
            $response["user"]["1"] = $request->session()->invalidate();
            $response["user"]["2"] = $request->session()->regenerateToken();
            $response["user"]["3"] = session()->flush();
            $code = 200;
        }
        return response()->json($response, $code);
    }
}
