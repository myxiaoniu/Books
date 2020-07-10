<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //没有登陆  跳转页面
    public function login()
    {
        return view('user.login');
    }

    //小说购买章节页面
    public function chapterPurchasesPage($id)
    {
        //$id  是小说章节id

        $chapter = DB::table('content')->where('con_id',$id)->first();
        $article = DB::table('article')->where('article_id',$chapter->c_article_id)->first();

        $user = session()->get('user');

        //小说已购买章节数
        $isBuyNums = DB::table('order')
            ->where('order_article_id',$article->article_id)
            ->where('order_user_id',$user->user_id)
            ->where('order_status',0)
            ->count();
//        dd($isBuyNums);

        //小说 vip 总章数
        $chapterVipNums = DB::table('content')
            ->where('c_article_id',$article->article_id)
            ->where('c_money','!=',0)
            ->count();

        //允许购买章数

        $allowBuy = $chapterVipNums - $isBuyNums;
//        dd($allowBuy);
//        dd($chapterVipNums);
//        $user = session()->get('user');
//
//        $articleChapterMoney = DB::table('content')
//            ->where('c_article_id',$article->article_id)
//            ->where('c_money','!=',0)
//            ->get();
//
//        $orderChapters = DB::table('order')
//            ->where('order_article_id',$article->article_id)
//            ->where('order_user_id',$user->user_id)
//            ->pluck('order_chapter_num');
//
//        $chapterNum = [];

//        foreach ($orderChapters as $val){
//            $chapterNum[] = $val;
//        }

        return view('user.chapterPurchasesPage',compact('article','chapter','allowBuy'));
    }

    //小说购买
    public function  chapterPurchases(Request $request)
    {
        $user = session()->get('user');
        $input = $request->all();

        // article_id   小说id
        // chapter_id   从哪章  开始
        // chapterNums  章节数
//
        //判断购买是否超标
        if($input['chapterNums'] > $input['allowBuy']){
            $data = [
                'status' => 201,
                'message' => '土豪，这部小说部分章节，您已购买，请重新输入'
            ];
        }else{
            //如果没有超标 则购买  小说章节  账户 余额为 10  则可以购买10章

            //判断用户账户余额
            $money = DB::table('user')
                ->join('user_attach', 'user_id','=','user_uid')
                ->where('user_id',$user->user_id)
                ->first();
            if($input['chapterNums'] > $money->user_money){
                $data = [
                    'status' => 202,
                    'message' => '您的账户余额已不足， 请充值后购买'
                ];
            }else{

                // 用户当前已购买的章节id
                $buyId = DB::table('order')
                    ->where('order_article_id',$input['article_id'])
                    ->where('order_user_id',$user->user_id)
                    ->pluck('order_chapter_id')->toArray();
//                dd($buyId);

                //当前 小说所有 vip 章节 id
                $chapterVipId = DB::table('content')
                    ->where('c_article_id',$input['article_id'])
                    ->where('c_money',1)
                    ->where('c_status',1)
                    ->pluck('con_id')->toArray();
//                dd($chapterVipId);

                $diff = array_diff($chapterVipId, $buyId);
//                dd($diff);


                //截取  传过来的章节id  截取 要购买的章节id
                $buyChapterId = [];
                foreach ($diff as $key=>$val){
                    if($val >= $input['chapter_id']){
                        $buyChapterId[] = $val;
                    }
                }
//                dd($buyChapterId);
                // 用户要购买的 章节id
                $article_chapter_id = array_slice($buyChapterId,0 , $input['chapterNums']);

                $insertData = [];
               foreach($article_chapter_id as $key => $value){
                   $insertData[] = [
                       'order_article_id' => $input['article_id'],
                       'order_user_id' => $user->user_id,
                       'order_chapter_id' => $value,
                       'order_money' => 1,
                       'order_status' => 0,
                       'order_create' => date('Y-m-d H:i:s')
                   ];
               }
               $res = DB::table('order')->insert($insertData);
               if($res){
                   $data =  [
                       'status' => 200,
                       'message' => '购买成功！'
                   ];
                   $user_money = DB::table('user_attach')->where('user_uid',$user->user_id)->first();
                   DB::table('user_attach')
                       ->where('user_uid',$user->user_id)
                       ->update(['user_money'=>$user_money->user_money - $input['chapterNums']]);
               }else{
                   $data =  [
                       'status' => 500,
                       'message' => '购买失败, 请稍后重试！'
                   ];
               }
            }


        }
        return $data;
    }

    //添加书架
    public function addBookrack(Request $request)
    {
        $input = $request->all();
        $user = session()->get('user');

        $bookrack = DB::table('bookrack')
            ->where('book_user_id',$user->user_id)
            ->where('book_article_id',$input['article_id'])
            ->first();
        if($bookrack){
            $data = [
                'status' => 201,
                'message' => '这本小说已存在书架'
            ];
        }else{

            $time = date('Y-m-d H-i-s', time());
            $arry = [
                'book_user_id' => $user->user_id,
                'book_article_id' => $input['article_id'],
                'book_create' => $time
            ];
            $res = DB::table('bookrack')
                ->insert($arry);

            if($res){
                $data = [
                    'status' => 200,
                    'message' => '添加成功!'
                ];
            }else{
                $data = [
                    'status' => 202,
                    'message' => '添加失败!'
                ];
            }

        }
        return $data;
    }
}
