<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index()
    {
        $author = session()->get('author');

//        $user_name = $user->user_name;

        //获取全部小说分类


        //获取当前时间
        $time = date('Y-m-d H-i-s', time());

        //获取小说封面  轮播
        $articleId = [1,2,3,4,5,6,7,8,9,10,11,12];
        $pic = DB::table('article')->whereIn('article_id',$articleId)->get();
        $num = [1,2,3,4,5,6,7,8,9,10,11];

        return view('author.index',compact('author', 'time','pic','num'));
    }

    //注册
    public function doregister(Request $request)
    {
        $input = $request->all();
//        dd($input);

        $author = DB::table('author')->where('author_name',$input['author_name'])->first();
        $phone = DB::table('author')->where('author_phone',$input['author_phone'])->first();
//        if(!($author)){
//            $mima = Crypt::encrypt($input['author_pwd']);
//            $time = date('Y-m-d H-i-s', time());
//            $res = DB::table('author')->insert(['author_name'=>$input['author_name'] , 'author_phone'=>$input['author_phone'], 'author_pwd'=>$mima,'author_create'=>$time]);
//            if($res){
//                $data = [
//                    'status'=>200,
//                    'message'=>'用户注册成功'
//                ];
//            }else{
//                $data = [
//                    'status'=>201,
//                    'message'=>'用户注册失败'
//                ];
//            }
//        }else{
//            $data = [
//                'status'=>203,
//                'message'=>'此用户已存在'
//            ];
//        }


        if(!($author)){
                if(!($phone)){
                    $mima = Crypt::encrypt($input['author_pwd']);
                    $time = date('Y-m-d H-i-s', time());
                    $res = DB::table('author')->insert(['author_name'=>$input['author_name'] , 'author_phone'=>$input['author_phone'], 'author_pwd'=>$mima,'author_create'=>$time]);
                    if($res){
                        $data = [
                            'status'=>200,
                            'message'=>'用户注册成功'
                        ];
                    }else{
                        $data = [
                            'status'=>201,
                            'message'=>'用户注册失败'
                        ];
                    }
                }else{
                    $data = [
                        'status'=>202,
                        'message'=>'此电话号码以被注册，请确认后提交'
                    ];
                }
            }else{
            $data = [
                'status'=>203,
                'message'=>'此用户已存在'
            ];
        }
        return $data;
    }

    public function dologin(Request $request)
    {
        $input = $request->all();
        $author = DB::table('author')->where('author_name',$input['author_name'])->first();
        if($author){
            if($author->author_status == 0){
                if($input['author_pwd'] == Crypt::decrypt($author->author_pwd)){
                    session()->put('author',$author);
                    $data = [
                        'status'=>200,
                        'message'=>'登录成功'
                    ];
                }else{
                    $data = [
                        'status'=>300,
                        'message'=>'密码错误'
                    ];
                }
            }else{
                $data = [
                    'status'=>400,
                    'message'=>'此用户已被禁用'
                ];
            }
        }else{
            $data = [
                'status'=>500,
                'message'=>'此用户不存在'
            ];
        }
        return $data;
    }

    public function loginout()
    {
        session()->flush();
        return redirect('author/index');
    }

}
