<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use Session;
use Validator;

class AuthChecker extends Controller
{
    public function action(Request $request)
    {
        $response["is_auth"] = false;
        $response["user"] = false;
        if (auth()->check()) {
            $response["is_auth"] = True;
            $response["user"] = auth()->user();
            $response["auth_token"] = Session::getID();
        }
        return response()->json($response, 200);
    }

}
