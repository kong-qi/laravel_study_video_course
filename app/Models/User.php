<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //注入iD修改
    public function getRouteKey()
    {
        return 'id';
    }
    //取得用户手机
    public function phone(){
        return $this->hasone(Phone::class,'user_id','id');
    }
    //取得评论
    public function comments(){
        return  $this->hasMany(Comment::class,'user_id','id');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_users','user_id','role_id');
    }


}
