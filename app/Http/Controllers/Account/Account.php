<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use Illuminate\Support\Facades\Auth;

class Account extends Controller
{
    public function action(Request $request)
    {
        $response["is_auth"] = false;
        $response["user"] = false;
        $code = 403;
        if (Auth::check()) {
            $response["is_auth"] = True;
            $response["user"] = Auth::user();
            $code = 200;
            $response["activated_codes"] = $this->get_activated_codes_provider(Auth::user()["id"]);
            $response["today_activated_codes"] = $this->get_codes_limit_provider(Auth::user()["id"]);
            $response["registered_tickets"] = $this->get_tickets_provider(Auth::user()["id"]);

        }
        return response()->json($response, $code);
    }

    public function get_activated_codes_provider($user_id){
        $belong_records = DB::table('belongs')
            ->select('belongs.ticket_id as ticket_id',
                'belongs.code_id as code_id',
                'belongs.created_at as created_time',
                'codes.code as code_string',
                'codes.code_tea_win as code_tea_win',
                'codes.code_main_win as code_main_win',
            )
            ->join('codes', 'belongs.code_id', '=', 'codes.id')
            ->where('belongs.user_id', $user_id)
            ->orderBy('code_tea_win', 'desc')
            ->orderBy('code_main_win', 'desc')
            ->get();
        return $belong_records;
    }
    public function get_codes_limit_provider($user_id){
        $limits = DB::table('code_limits')
            ->select('code_limits.counter_of_limit as activated_today')
            ->where('date_today', date("Y-m-d"))
            ->where('user_id', $user_id)
            ->get();
        if(!isset($limits[0]->activated_today)){
            $limits[0] = (object)["activated_today" => 0];
        }
        return $limits;
    }
    public function get_tickets_provider($user_id){
        $limits = DB::table('tickets')
            ->select('tickets.ticket_path as ticket_path',
                'tickets.created_at as time_created')
            ->where('user_id', $user_id)
            ->get();
        return $limits;
    }
}
