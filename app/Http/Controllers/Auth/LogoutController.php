<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        if (Auth::check()) {
            $response["is_auth"] = True;
            $response["user"] = Auth::logout();
            $code = 200;
        }
        return response()->json($response, $code);
    }
}
