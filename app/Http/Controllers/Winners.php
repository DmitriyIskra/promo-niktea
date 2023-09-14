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
        $code = 418;
        $data = $request->all();
        if(isset($data['type'], $data['page']) && $data) {
            if($data['page'] === 1){
                $data['page'] = 0;
            }else {
                $data['page'] -= 1;
            }
            if ($data['type'] == 'main') {
                $code = 200;
                $response["result"] = $this->get_main_prisez(Auth::user() ? Auth::user()["id"] : "-1", $data['page']);
            }elseif ($data['type'] == 'tea'){
                $code = 200;
                $response["result"] = $this->get_tea_prisez(Auth::user() ? Auth::user()["id"] : "-1", $data['page']);
            }else{
                $response["error"] = "no type of winners";
                $code = 400;
            }
        }else{
            $response["error"] = "no type of winners";
            $code = 400;
        }
        return response()->json($response, $code);
    }

    public function get_info_by_winners(Request $request)
    {
        $res = false;
        $data = $request->all();
        if(isset($data['type']) && $data) {
            $string = "code_".$data['type']."_win";
            $response = DB::table('codes')
                ->select('code')
                ->where($string, '=', '1')
                ->limit(1)
                ->get();
            if (isset($response[0])) {
                $res = true;
            }else{
                $res = false;
            }
        }else {
            $res = false;
        }
        return response()->json($res);
    }

    public function get_main_prisez($user_id, $page){

        $response = DB::table('belongs')
            ->select(
                'belongs.user_id as belongs_user_id',
                'users.phone as user_phone',
                'users.email as user_email',
                'codes.code_main_win as code_main_win',
                'codes.code_main_win_discription as code_description',
                'code_main_win_date_delivery as code_delivery'
            )
            ->join('codes', 'codes.id', '=', 'belongs.code_id')
            ->join('users', 'belongs.user_id', '=', 'users.id')
            ->Where('code_main_win', '=', '1')
            ->offset($page*20)
            ->limit(20)
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

    public function get_tea_prisez($user_id, $page){

        $response = DB::table('belongs')
            ->select(
                'belongs.user_id as belongs_user_id',
                'users.phone as user_phone',
                'users.email as user_email',
                'codes.code_tea_win as code_tea_win',
                'codes.code_tea_win_discription as code_description',
                'code_tea_win_date_delivery as code_delivery'
            )
            ->join('codes', 'codes.id', '=', 'belongs.code_id')
            ->join('users', 'belongs.user_id', '=', 'users.id')
            ->Where('code_tea_win', '=', '1')
            ->offset($page*20)
            ->limit(20)
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
