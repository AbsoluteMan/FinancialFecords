<?php

namespace App\Http\Controllers;

use App\Http\Model\Lendform;
use App\Http\Model\Lendlist;
use App\Http\Model\Lists;
use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function main()
    {
        $all_money = User::first() -> user_money;
        $lend = 0;
        $data = Lendform::all();
        foreach ($data as $v){
            $lend += $v->lender_money_returnd;
        }
        $now_money = $all_money - $lend;
        $now_money = sprintf('%.2f',$now_money);
        return view('main',compact('all_money','now_money'));
    }

    public function setting()
    {
        if($input = Input::all()){
            $user = User::first();
            $rules = [
              'user_money'=>'numeric',
            ];
            $message = [
              'user_money.numeric'=>'请输入合法金额!',
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $user -> user_money = $input['user_money'];
                $re = $user -> update();
                $list = Lists::all();
                foreach($list as $dv){
                    $dv -> delete();
                }
                $lender_his = Lendlist::all();
                foreach($lender_his as $dv){
                    $dv -> delete();
                }
                $lendform = Lendform::all();
                foreach($lendform as $dv){
                    $dv -> delete();
                }
                return redirect('/index');
            }else{
                return back()->withErrors($validator);
            }
        }else{
            $user_money = User::first()->user_money;
            return view('setting',compact('user_money'));
        }
    }

    public function income()
    {
        if(Input::all()){
            $input = Input::except('_token');
            $input['list_time'] = time();
            $input['list_type'] = 1;
            $rules = [
                'list_money'=>'numeric|min:0',
                'list_remark'=>'required',
            ];
            $message = [
                'list_money.numeric'=>'请输入合法金额!',
                'list_money.min'=>'请输入合法金额!',
                'list_remark.required'=>'为方便查账,备注内容不能为空！',
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $user = User::first();
                $user_money = $user -> user_money;
                $user_money += $input['list_money'];
                $user -> user_money = $user_money;
                $user -> update();
                $input['list_allmoney'] = $user_money;
                $re = Lists::create($input);
                return redirect('/index');
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return view('income');
        }
    }

    public function pay()
    {
        if(Input::all()){
            $input = Input::except('_token');
            $input['list_time'] = time();
            $input['list_type'] = 2;
            $rules = [
                'list_money'=>'numeric|min:0',
                'list_remark'=>'required',
            ];
            $message = [
                'list_money.numeric'=>'请输入合法金额!',
                'list_money.min'=>'请输入合法金额!',
                'list_remark.required'=>'为方便查账,支出理由不能为空！',
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $user = User::first();
                $user_money = $user -> user_money;
                $user_money -= $input['list_money'];
                $user -> user_money = $user_money;
                $user -> update();
                $input['list_allmoney'] = $user_money;
                $re = Lists::create($input);
                return redirect('/index');
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return view('pay');
        }
    }

    public function detailed()
    {
        $data = Lists::orderBy('list_id','desc')->get();
        return view("Detailed",compact('data'));
    }

    public function detailedall($id)
    {
        $data = Lists::where('list_id',$id)->first();
        return view('DetailedAll',compact('data'));
    }
}
