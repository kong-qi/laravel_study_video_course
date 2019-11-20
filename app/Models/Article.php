<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'comments','model_type','model_id');
    }
    public function tags(){
        return $this->morphToMany(Tag::class,'model','tag_rels','model_id','tag_id');
    }
}
