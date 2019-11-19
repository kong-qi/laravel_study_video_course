<?php

namespace App\Http\Controllers;

use App\Jobs\LogJob;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function index(){
        //分发任务
        $data=[
            'name'=>'demo'.mt_rand(1,100),
            'email'=>'qq@qq.com'
        ];
        dump($data);
        LogJob::dispatch($data)->onQueue('job');
    }
}
