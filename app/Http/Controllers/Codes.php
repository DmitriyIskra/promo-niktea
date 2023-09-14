<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entries;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use Illuminate\Support\Facades\Auth;

class Codes extends Controller
{
    public function checkout(Request $request)
    {
        $response = [];
        $code = 418;
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $data = $request->all();
            $limit = DB::table('entries')
                ->select('user_id', 'counter')
                ->where('user_id', '=', $user_id)
                ->where('date', '=', date("Y-m-d"))
                ->orderBy("id", "DESC")
                ->limit(1)
                ->get();

            if(!isset($limit[0]) || (isset($limit[0]) && $limit[0]->counter < 40)) {
                if ($data && isset($data["code"])) {
                    $searcher = DB::table('codes')
                        ->select('code')
                        ->where('active', '=', 1)
                        ->where('code', '=', $data["code"])
                        ->limit(1)
                        ->get();
                    if (isset($searcher[0])) {
                        $response = ["error" => null];
                        $code = 200;
                    } else {
                        $response = ["error" => "Неверный код"];
                        $code = 412;
                    }
                } else {
                    $response = ["error" => "Не указан код"];
                    $code = 400;
                }
            }else{
                $response = ["error" => "Превышен лимит проверок кода"];
                $code = 429;
            }
            Entries::query()->updateOrCreate(['user_id' => $user_id, 'date' => date("Y-m-d")],[
                'user_id' => $user_id,
                'date' => date("Y-m-d"),
                'counter' => ($limit[0]->counter ?? 0) + 1,
                'updated_at' => now()
            ]);
        }else{
            $response = ["error" => "Ошибка авторизации"];
            $code = 403;
        }
        return response()->json($response, $code);
    }

}
