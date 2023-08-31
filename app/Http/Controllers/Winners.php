<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use Illuminate\Support\Facades\Auth;

class Winners extends Controller
{
    public function action(Request $request)
    {
        $response = [];
        $response["main_prizes"] = $this->get_main_prisez(Auth::user() ? Auth::user()["id"] : "-1");
        $response["tea_prizes"] = $this->get_tea_prisez(Auth::user() ? Auth::user()["id"] : "-1");
        return response()->json($response);
    }

    public function get_main_prisez($user_id){

        $response = DB::table('belongs')
            ->select(
                'belongs.user_id as belongs_user_id',
                'users.phone as user_phone',
                'users.email as user_email',
                'codes.code_main_win as code_main_win',
                'codes.code_main_win as code_main_description',
            )
            ->join('codes', 'codes.id', '=', 'belongs.code_id')
            ->join('users', 'belongs.user_id', '=', 'users.id')
            ->Where('code_main_win', '=', '1')
            ->get()->toArray();

        if($user_id == "-1"){
            $response = $this->blur_data($response);
        }else{
            foreach ($response as $key => $value){
                if($value->belongs_user_id == $user_id){
                    unset($response[$key]);
                    array_unshift($response, $value);
                }
                //unset($value->belongs_user_id);
            }
            $response = $this->blur_data($response);
        }
        return $response;
    }

    public function get_tea_prisez($user_id){

        $response = DB::table('belongs')
            ->select(
                'belongs.user_id as belongs_user_id',
                'users.phone as user_phone',
                'users.email as user_email',
                'codes.code_tea_win as code_tea_win',
                'codes.code_tea_win as code_tea_description',
            )
            ->join('codes', 'codes.id', '=', 'belongs.code_id')
            ->join('users', 'belongs.user_id', '=', 'users.id')
            ->Where('code_tea_win', '=', '1')
            ->get()->toArray();

        if($user_id == "-1"){
            $response = $this->blur_data($response);
        }else{
            foreach ($response as $key => $value){
                if($value->belongs_user_id == $user_id){
                    unset($response[$key]);
                    array_unshift($response, $value);
                }
                //unset($value->belongs_user_id);
            }
            $response = $this->blur_data($response);
        }
        return $response;
    }

    public function blur_data($data){

        foreach ($data as $key => $value){
            $length_phone =strlen($value->user_phone);
            $value->user_phone = $value->user_phone[0] . $value->user_phone[1] .str_repeat('*', $length_phone - 7) . $value->user_phone[$length_phone-5] .$value->user_phone[$length_phone-4] . $value->user_phone[$length_phone-3] . $value->user_phone[$length_phone-2] . $value->user_phone[$length_phone-1];
            $value->user_email = $this->mask_email($value->user_email);

        }
        return $data;
    }

    function mask_email( $email ) {
        /*
        Author: Fed
        Simple way of masking emails
        */

        $char_shown = 3;

        $mail_parts = explode("@", $email);
        $username = $mail_parts[0];
        $len = strlen( $username );

        if( $len <= $char_shown ){
            return implode("@", $mail_parts );
        }

        //Logic: show asterisk in middle, but also show the last character before @
        $mail_parts[0] = substr( $username, 0 , $char_shown )
            . str_repeat("*", $len - $char_shown - 1 )
            . substr( $username, $len - $char_shown, 3  )
        ;

        return implode("@", $mail_parts );
    }

}
