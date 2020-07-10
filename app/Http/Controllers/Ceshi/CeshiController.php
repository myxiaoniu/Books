<?php

namespace App\Http\Controllers\Ceshi;

use App\Http\Controllers\Controller;
use App\Model\User;
use Dotenv\Validator;
use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use phpDocumentor\Reflection\Type;

class CeshiController extends Controller
{
    public function ceshi(Request $request)
    {
       $input = $request->all();

//       Mail::raw($input['content'], function ($msg) use ($input['user_email'], $input['title']){
//
//    });
//        Mail::raw($input['content'], function ($message) use ($input['user_email'],$input['title']) {
//            $message->subject($title);
//            $message->to($toMail);
//        });
//        $email = $input['email'];
        $code = 2342342;

        Redis::set('code',$code);
        Redis::expire('code',10);
        die;

        $content = '亲爱的XX 用户你好，欢迎注册 全书网，本次的验证码为'.$num;

        Mail::raw($content, function($message){
            $message->to('2454182243@qq.com');
            $message->subject('啦啦网邮箱注册激活');
        });

//        $flag=
//            ;Mail::raw($input['content'],function($message) {
//
//            $to= $email;
//
//            $message->to($to)->subject('纯文本信息邮件测试');
//          });
//
//        if(!$flag){
//
//            echo '发送邮件成功，请查收！';
//
//        }else{
//
//            echo '发送邮件失败，请重试！';
//
//        }





    }

    public function docode(Request $request)
    {

//        dd(Redis::get('num'));
//        return view('email.email');
//        $name = Redis::get('user');
//        dd($name
//        );
//        $code = Redis::get('code');
//        dd($code);
        return  '你好吗？';
    }
}
