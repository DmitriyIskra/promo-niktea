<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;


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
                'belongs.code_id as belongs_client_code_id',
                'belongs.user_id as belongs_user_id',
                'belongs.ticket_id as belongs_ticket_id',
                'tickets.ticket_path as ticket_path',
                'users.name as user_name',
                'users.second_name as user_second_name',
                'users.patronymic as user_patronymic',
                'users.phone as user_phone',
                'users.email as user_email',
                'users.winner as winner'

            )
            ->join('codes', 'codes.id', '=', 'belongs.code_id')
            ->join('tickets', 'tickets.id', '=', 'belongs.ticket_id')
            ->join('users', 'belongs.user_id', '=', 'users.id')
            ->where('codes.code', "LIKE", "%$code%")
            ->groupBy('belongs_ticket_id')
            ->get();

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
        return $researcher;
        return View::make('Admin',["researcher" => $researcher]);
    }
}
