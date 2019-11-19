<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DbController extends Controller
{
    //
    public function index(){
        //原生创建一条数c
        $passowrd=bcrypt('123456');
        //DB::table('users')->truncate();//User::truncate();
        //$list=DB::select("select * from users");
        //dump($list);
        //$r=DB::insert("insert into users (name,email,password) value ('kongqi2','hb2@qq.ocm','".$passowrd."')");
        //$r=DB::update("update users set name='xiaobai' where id='1'");
        //$r=DB::delete('delete from users where id=1');
        //DB::statement('drop table users');


        /*$list=DB::table('users')->get();
        dump($list->toArray());
        //$r=DB::table('users')->insert(['name'=>'demo2','email'=>'email@qq.com','password'=>$passowrd]);
        $r=DB::table('users')->where('id',3)->update(['name'=>'demo3']);
        dump($r??'');*/
        $list=User::get();
        dump($list->toArray());
       /* $r=new User();
        $r->name='demo5';
        $r->email='demo5@qq.com';
        $r->password=$passowrd;
        $r->save();
        dump($r);*/


    }
}
