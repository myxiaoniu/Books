<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Mews\Captcha\Captcha;

class LoginController extends Controller
{
    public function doregister(Request $request)
    {
        //获取前台传输的数据
        $input = $request->all();
//        dd(gettype($input['user_phone']));
        //判断数据库中有没有此用户
        $res_name = DB::table('user')->where('user_name',$input['user_name'])->first();
        //判断此电话数据库中有没有
        $res_phone = DB::table('user')->where('user_phone',$input['user_phone'])->first();
        if($res_name){
            $data = [
                'status'=>100,
                'message'=>'此用户已存在'
            ];

        }else if ($res_phone){
            $data = [
                'status'=>200,
                'message'=>'此号码已存在'
            ];
        }else{
            //密码 Crypt 加密
            $mima = Crypt::encrypt($input['user_pwd']);
            //当前时间

            $time = date('Y-m-d  H-i-s', time());
            //将用户信息存储到数据库中
            $arry = [
                'user_name'=>$input['user_name'],
                'user_create'=>$time,
                'user_pwd'=>$mima,
                'user_phone'=>$input['user_phone']
            ];
            $create = DB::table('user')
                ->insertGetId($arry);
            //判断数据是否存储成功
            if($create){
                $data = [
                    'status'=>300,
                    'message'=>'注册成功'
                ];

                $userAttach = [
                    'user_uid'=> $create,
                ];
                $attach = DB::table('user_attach')
                    ->insert($userAttach);

            }else{
                $data = [
                    'status'=>400,
                    'message'=>'注册失败'
                ];
            }
        }
        return $data;
    }

    public function login(Request $request)
    {
        $input = $request->all();
//        dump($input);die;
        $user = DB::table('user')->where('user_name',$input['user_name'])->first();
        if ($user) {
            if ($user->user_status == 0) {

                if (!($input['user_pwd'] != Crypt::decrypt($user->user_pwd))) {
                    session()->put('user', $user);
                    $data = [
                        'status' => 200,
                        'message' => "登录成功"
                    ];
                } else {
                    $data = [
                        'status' => 100,
                        'message' => "密码错误"
                    ];
                }
            }else{
                $data = [
                    'status'=>300,
                    'message'=>"此用户已被禁用"
                ];
            }
        }else{
            $data = [
                'status'=>400,
                'message'=>"此用户不存在，请再次确认后登录"
            ];
        }
        return $data;
    }

    public function loginout()
    {
        session()->flush();
        return redirect('home/index');
    }
}
