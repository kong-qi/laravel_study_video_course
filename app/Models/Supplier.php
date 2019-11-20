<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    public function userHistory()
    {
        return $this->hasManyThrough(History::class, User::class,'supplier_id','user_id','id');
    }
}
