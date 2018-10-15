<?php

namespace App\Http\Controllers;

use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    public function login()
    {
        if($input = Input::all()){
            $user = User::first();
            if($user->user_name != $input['user_name'] || Crypt::decrypt($user->user_pass) != $input['user_pass']){
                return back()->with('msg','请检查您的用户名或密码！');
            }
            session(['user'=>$user]);
            return redirect('index');
        }else{
            return view('login');
        }
    }

    public function crypt()
    {
       $c = Crypt::encrypt("qwer3636sdo20099");
       echo $c;
    }

    public function quit()
    {
        session(['user'=>null]);
        return redirect('/');
    }
}