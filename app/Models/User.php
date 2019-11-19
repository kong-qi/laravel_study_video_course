<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //注入iD修改
    public function getRouteKey()
    {
        return 'user_id';
    }

}
