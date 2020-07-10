<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['user_id','post_id','title','content'];
    //关联用户
    public function user() {
        return $this->belongsTo('App\User','user_id');
    }
    // 关联文章
    public function post() {
        return $this->belongsTo('App\Post','post_id');
    }
}
