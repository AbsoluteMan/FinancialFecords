<?php

namespace App\Http\Controllers;

use App\Http\Model\Lendform;
use App\Http\Model\Lendlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LendController extends Controller
{
    public function LendIndex()
    {
        return view('LendIndex');
    }

    public function Lendform()
    {
        if(Input::all()){
            $input = Input::except('_token');
            $input['lender_time'] = strtotime($input['lender_time']);
            $input['lender_system_time'] = time();
            $input['lender_money_returnd'] = $input['lender_money'];
            $input['lender_flag'] = 1;
            $rules = [
                'lender_name'=>'required',
                'lender_why'=>'required',
                'lender_money'=>'numeric|min:1',
            ];
            $message = [
                'lender_name.required'=>'请填写借款人姓名!',
                'lender_why.required'=>'请填写借款人事由!',
                'lender_money.numeric'=>'请输入合法金额!',
                'lender_money.min'=>'最小金额为1元!',
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator -> passes()){
                Lendform::create($input);
                return back() -> with('message','借出申请提交成功！');
            }else{
                return back() -> withErrors($validator);
            }
        }else{
            return view('Lendform');
        }
    }

    public function Lendreturn()
    {
        $Hang = Lendform::where('lender_flag',1)->get();
        $Complete = Lendform::where('lender_flag',2)->orderBy('lender_id','desc')->get();
        return view('Lendreturn',compact('Hang','Complete'));
    }

    public function lendpage($id)
    {
        $lender_data = Lendform::where('lender_id',$id)->first();
        return view('Lendpage',compact('lender_data'));
    }

    public function ajax()
    {
        $input = Input::except('_token','lender_id');
        $input['his_system_time'] = time();
        $re = Lendlist::create($input);
        $data = Lendlist::where('his_pid',$input['his_pid'])->get();

        $input = Input::all();
        $id = Lendform::where('lender_id',$input['lender_id'])->first();
        $id->lender_money_returnd -= $input['his_returnd'];
        if($id->lender_money_returnd <= 0){
            $id->lender_flag = 2;
        }
        $id->update();
        return $data;
    }

    public function getajax()
    {
        $input = Input::all();
        $pid = $input['id'];
        $data = Lendlist::where('his_pid',$pid)->orderBy('his_id','desc')->get();
        return $data;
    }

    public function ajax_returnd()
    {
        $input = Input::all();
        $data = Lendform::where('lender_id',$input['lender_id'])->first();
        return $data->lender_money_returnd;
    }
}
