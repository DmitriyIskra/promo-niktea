<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;
use Illuminate\Support\Facades\View;

class Admin extends Controller
{
    public function action(Request $request)
    {
        if (Auth::check()) {
            $user =  Auth::user();
            if($user['admin'] == 1){
                return View::make('Admin');
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
        return $request["search"];
        $researcher = DB::table('users')
            ->select()
            ->join()
            ->get();
        $html = "<div><p>UWIOGBWEIVB</p></div>";
        return $html;
    }
}
