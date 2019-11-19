<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class IndexController extends Controller
{
    //
    public function index(Request $request)
    {

            return  view('index.input');


    }
    public function post4(UserPost $userPost){


    }
    public function post3(Request $request){
        $rules=[
            'name'=>'required|min:2',
            'pwd'=>'required|min:6'
        ];
        $message=[
            'name.min'=>'名字的字符最少:min字符',
            'pwd.required'=>'密码是必填的',
            'pwd.min'=>'密码的字符最少:min字符'
        ];
        $attr=[
            'name'=>'名字',
            'pwd'=>'密码'
        ];
        $this->validate($request,$rules,$message,$attr);

    }
    public function post(Request $request)
    {
        $rules=[
            'name'=>'required|min:2',
            'pwd'=>'required|min:6'
        ];
        $message=[
//            'name.min'=>'名字的字符最少:min字符',
//            'pwd.required'=>'密码是必填的',
//            'pwd.min'=>'密码的字符最少:min字符'
        ];
        $attr=[

            'pwd'=>'密码'
        ];
        $validator = Validator::make($request->all(), $rules,$message,$attr);
        //验证不通过进行处理
        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }
    }
    public function message(){

    }


}
