<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;
use Validator;
use App\Models\Codes;
use App\Models\CodeLimits;

class RegisterController extends Controller
{
    public function action(Request $request)
    {
        $code = 200;
        $data = $request->all();
        //$file = $request->check->storeAs('files', 'file.txt');
        $file = $request->file('check');
        return $file;
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
            'code' => 'required|string',
            'email' => 'required|email|unique:users',
            //'password' => 'required|min:6|string',
            //'password' => $this->pass_gen(),
            'check' => 'required|file'
        ], $messages);

        if (!$validator->fails()) {
            $data['password'] = $this->pass_gen();
            $error = Codes::query()->where('code', $data['code'])->first();
            if (!$error) {
                $code = 412;
                $response['errors'][] = 'Неправильный код упаковки - ' . $data["code"];
            } else {
                $deactivator = new Codes;
                $active_mod = $deactivator->avaibler($data['code']);
                if (!$active_mod) {
                    $response['errors'][] = 'Данный код упаковки уже зарегистрирован - ' . $data["code"];
                    $code = 406;
                } else {
                    $disabler = $deactivator->deactivator($active_mod["id"]);
                }
                if ($disabler) {
                    $check = $this->create($data);
                    $limit = new CodeLimits;
                    $limit->iterator($check["id"]);
                    $check["created_time"] = date('d-m-Y H:i:s');
                    unset($check["updated_at"]);
                    unset($check["created_at"]);
                    $response['errors'] = Null;
                    $response['is_register'] = true;
                    $response['user_info'] = $check;
                    $response['code_activated'] = filter_var($disabler, FILTER_VALIDATE_BOOLEAN);
                } else {
                    $code = 418;
                    $response['errors'][] = 'Не удалось применить код - ' . $data["code"];
                }
            }
        } else {
            $code = 406;
            $errors = $validator->errors();
            foreach ($errors->all() as $message) {
                $response['errors'][] = $message;
                $response['is_register'] = false;
                $response['user_info'] = Null;
            }
        }
        return response()->json($response, $code);
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
}
