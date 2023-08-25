<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;

class AuthChecker extends Controller
{
    public function action(Request $request)
    {
        $response["is_auth"] = false;
        $response["user"] = false;
        $code = 403;
        if (Auth::check()) {
            $response["is_auth"] = True;
            $response["user"] = Auth::user();
            $response["auth_token"] = Session::getID();
            $code = 200;
        }
        return response()->json($response, $code);
    }
}
