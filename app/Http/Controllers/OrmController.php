<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Phone;
use App\Models\Role;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class OrmController extends Controller
{
    //
    public function index(){
        //$phone=User::find(1)->phone;
        //dump($phone->toArray()) ;
        //$phone=Phone::find(1);
        //dump($phone->user->toArray());
        /*$comment=User::find(1);
        dump($comment->comments->toArray());*/
        /*$comment=Comment::find(1);
        dump($comment->user->toArray());
        /*$role=User::find(1);
        dump($role->roles->toArray());*/
        /*$role=Role::find(1);
        dump($role->users->toArray());*/
        $history=Supplier::find(1);
        dump($history->userHistory->toArray());
    }
}
