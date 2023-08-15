<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Belong;
use App\Models\CodeLimits;
use App\Models\Codes;
use App\Models\Tickets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Validator;


class RegisterController extends Controller
{
    public function action(Request $request)
    {
        $http_code = 200;
        $data = $request->all();

        $response = [];
        $messages = [
            'required' => 'Поле :attribute обязательно.',
            'unique' => 'Значение поля :attribute уже занято.',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'second_name' => 'required|string',
            'patronymic' => 'required|string',
            'phone' => 'required|max:16|string',
            'code' => 'required|array',
            'email' => 'required|email',
            //'password' => 'required|min:6|string',
            //'password' => $this->pass_gen(),
            'check' => 'required|file|image'
        ], $messages);
        if (!$validator->fails()) {
            $data['password'] = $this->pass_gen();

            foreach ($data['code'] as $code) {
                $error = Codes::query()->where('code', $code)->first();
                if (!$error) {
                    $http_code = 412;
                    $response['errors'][] = 'Неправильный код упаковки - ' . $code;
                } else {
                    $deactivator = new Codes;
                    $active_mod = $deactivator->avaibler($code);
                    if (!$active_mod) {
                        $response['errors'][] = 'Данный код упаковки уже зарегистрирован - ' . $code;
                        $http_code = 406;
                        $disabler = false;
                    } else {
                        $disabler = $deactivator->deactivator($active_mod["id"]);
                    }
                    if ($disabler) {
                        $is_created = (new User)->is_created($data["email"]);
                        if ($is_created) {
                            $check = $is_created;

                        } else {
                            $check = $this->create($data);
                        }
                        $error_count = DB::table('code_limits')
                            ->where('user_id', '=', $check["id"])
                            ->where('date_today', '=', date('Y-m-d'))
                            ->limit(1)
                            ->get();
                        if (!isset($error_count[0])) {
                            //return 1;
                            $error_count = 0;
                        } else {
                            $error_count = $error_count[0]->counter_of_limit;
                            if ($error_count >= 15) {
                                $response['errors'][] = 'Вы не можете зарегистрировать более 15 кодов в сутки';
                                $http_code = 406;
                                $disabler = $deactivator->activator($active_mod["id"]);
                                return response()->json($response, $http_code);
                            }
                        }
                        $limit = new CodeLimits;
                        $limit->iterator($check["id"], $error_count);
                        $check["created_time"] = date('d-m-Y H:i:s');
                        unset($check["updated_at"]);
                        unset($check["created_at"]);
                        $response['errors'] = Null;
                        $response['is_register'] = true;
                        $response['user_info'] = $check;
                        $response['code_activated'] = filter_var($disabler, FILTER_VALIDATE_BOOLEAN);
                        $file = $request->check->storeAs('files', $this->img_name_gener($request->file('check')->extension()));
                        $check_saver = new Tickets;
                        $saved_file = $check_saver->saver($response['user_info']["id"]);
                        $belonger = new Belong;
                        $belonger->saver($saved_file["id"], $active_mod["id"], $response['user_info']["id"]);
                    } else {
                        $http_code = 418;
                        $response['errors'][] = 'Не удалось применить код - ' . $code;
                    }
                }
            }
        } else {
            $http_code = 406;
            $errors = $validator->errors();
            foreach ($errors->all() as $message) {
                $response['errors'][] = $message;
                $response['is_register'] = false;
                $response['user_info'] = Null;
            }
        }
        return response()->json($response, $http_code);
    }

    public function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'second_name' => $data['second_name'],
            'patronymic' => $data['patronymic'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return $user;

    }

    public function pass_gen($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function img_name_gener($extension)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
// Output: video-g6swmAP8X5VG4jCi.mp4
        return 'image-' . substr(str_shuffle($permitted_chars), 0, 16) . '.' . $extension;
    }
}
