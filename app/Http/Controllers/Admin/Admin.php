<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Codes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Result;
use Session;
use Validator;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use App\Models\User;



class Admin extends Controller
{
    public function action(Request $request)
    {
        $researcher = [];
        return View::make('Admin',["researcher" => $researcher]);

        if (Auth::check()) {
            $user =  Auth::user();
            if($user['admin'] == 1){
                $researcher = [];
        return View::make('Admin',["researcher" => $researcher]);
            }else{
                return redirect('/');
            }
            //return Auth::user();
        }else{
            return "Not Admin";
        }
    }

    public function search(Request $request)
    {
        $code = $request["search"];
        $researcher = DB::table('belongs')
            ->select('codes.id as code_id',
                'codes.code as code_string',
                'codes.updated_at as code_activated_time',
                'codes.code_tea_win as code_tea_win',
                'codes.code_tea_win_discription as code_tea_win_discription',
                'codes.code_tea_win_date_delivery as code_tea_win_date_delivery',
                'codes.code_main_win as code_main_win',
                'codes.code_main_win_discription as code_main_win_discription',
                'codes.code_main_win_date_delivery as code_main_win_date_delivery',
                'belongs.code_id as belongs_client_code_id',
                'belongs.user_id as belongs_user_id',
                'belongs.ticket_id as belongs_ticket_id',
                'tickets.ticket_path as ticket_path',
                'users.name as user_name',
                'users.second_name as user_second_name',
                'users.patronymic as user_patronymic',
                'users.phone as user_phone',
                'users.email as user_email'
            )
            ->join('codes', 'codes.id', '=', 'belongs.code_id')
            ->join('tickets', 'tickets.id', '=', 'belongs.ticket_id')
            ->join('users', 'belongs.user_id', '=', 'users.id')
            ->where('codes.code', "LIKE", "%$code%")
            ->get();

        $result = [];
        foreach($researcher as $key => $item){
            if($item->code_tea_win == 1){
                $item->code_tea_win = "checked";
            }
            if($item->code_main_win == 1){
                $item->code_main_win = "checked";
            }
            $result[$item->belongs_user_id]["user"]["user_name"] = $item->user_name;
            $result[$item->belongs_user_id]["user"]["user_second_name"] = $item->user_second_name;
            $result[$item->belongs_user_id]["user"]["user_patronymic"] = $item->user_patronymic;
            $result[$item->belongs_user_id]["user"]["user_phone"] = $item->user_phone;
            $result[$item->belongs_user_id]["user"]["user_email"] = $item->user_email;
            $result[$item->belongs_user_id]["user"]["belongs_user_id"] = $item->belongs_user_id;
            $result[$item->belongs_user_id]["codes"][] = $item;
            $result[$item->belongs_user_id]["user"]["code_counter"] = count($result[$item->belongs_user_id]["codes"]);
            unset($item->user_name, $item->user_second_name, $item->user_patronymic, $item->user_phone, $item->user_email);
        }
        /*$researcher = DB::table('belongs')
            ->select('codes.id as code_id',
                'codes.code as code_string',
                'belongs.updated_at as record_create_time',
                'belongs.code_id as belongs_client_code_id',
                'belongs.user_id as belongs_user_id',
                'belongs.ticket_id as belongs_ticket_id'
            )
            ->join('codes', 'codes.id', '=', 'belongs.code_id')
            ->where('codes.code', "LIKE", $code)
            ->groupBy('belongs_ticket_id')
            ->limit(1)
            ->get();


        $researcher2 = DB::table('belongs')
            ->select('codes.id as code_id',
                'codes.code as code_string',
                'belongs.updated_at as record_create_time',
                'belongs.code_id as belongs_client_code_id',
                'belongs.user_id as belongs_user_id',
                'belongs.ticket_id as belongs_ticket_id',
                'tickets.ticket_path as ticket_path',
                'users.name as user_name',
                'users.second_name as user_second_name',
                'users.patronymic as user_patronymic',
                'users.phone as user_phone',
                'users.email as user_email'
            )
            ->join('codes', 'codes.id', '=', 'belongs.code_id')
            ->join('tickets', 'tickets.id', '=', 'belongs.ticket_id')
            ->join('users', 'belongs.user_id', '=', 'users.id')
            ->where('users.id', "=", $researcher[0]->belongs_user_id)
            ->get();
        */
        return $result;
        return View::make('Admin',["researcher" => $researcher]);
    }

    public function saver(Request $request)
    {
        $code = $request["search"];
        if($request["value"] == "true"){
            $request["value"] = 1;
        }elseif($request["value"] == "false"){
            $request["value"] = 0;
        }
        $saver = Codes::query()->updateOrCreate(['id' => $request["id"]],
            [
                $request["field"] => $request["value"],
            ]);
        return $saver;
    }

}
