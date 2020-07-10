<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    // 反向关联用户表
    public function user() {
        return $this->belongsTo(User::class);
    }
}
