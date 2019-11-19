<?php

namespace App\Http\Controllers;

use App\Mail\RegistMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function index(){
        $user=User::find(1);
        Mail::to('1357671552@qq.com')->queue(new RegistMail($user));
    }
}
