<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //取得会员
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function from(){
        return $this->morphTo('from','model_type','model_id');
    }
}
