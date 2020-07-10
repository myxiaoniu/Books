<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $guarded; // 不可以通过数组注入的字段
    protected $fillable = ['title','content','user_id']; //可以通过数组注入的字段

    // 关联用户表
    public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }

    // 关联评论表
    public function comments() {
        return $this->hasMany('App\Comments','post_id');
    }

    // 关联攒
    public function zans($user_id) {
        return $this->hasOne(\App\Zans::class)
            ->where('user_id',$user_id);
    }

    // 文章的所有攒
    public function zanss() {
        return $this->hasMany(\App\Zans::class);
    }
}
