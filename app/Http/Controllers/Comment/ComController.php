<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComController extends Controller
{
    //  小说 评论页面
    public function commentPage($id)
    {
        //$id  为小说ID

        //小说信息
        $article = DB::table('article')
            ->where('article_id',$id)
            ->first();

        //作者信息
        $author = DB::table('author')
            ->where('author_id',$article->article_author_id)
            ->first();

        //小说分类
        $articleClass = DB::table('class')
            ->where('class_id',$article->article_class_id)
            ->first();

        //关于该本小说的 评论
        $comment = DB::table('comment')
            ->join('user','com_user_id','=','user_id')
            ->join('user_attach','com_user_id','=','user_uid')
            ->where('com_article_id',$article->article_id)
            ->where('com_type',0)
            ->where('com_status',0)
//            ->orderBy('com_id','desc')
            ->orderBy('com_id','desc')
            ->get()
            ->toArray();
//        dd($comment);

////        拿到评论  的 id
        $commentID = [];
        foreach($comment as $index => &$val){
            array_push($commentID, $val->com_id);
            $val->reply_list = [];
            $val->reply_count = [];
        }
//////        dump($commentID);
////        //拿到评论所属的  回复
        foreach($commentID as $index => $value){
//            dd($value);
            $comment[$index]->reply_list = DB::table('comment as c')
                ->where('c.com_article_id',$article->article_id)
                ->where('c.com_type',1)
                ->where('c.com_status',0)
                ->where('c.com_superior',$value)
                ->leftJoin('user as u', 'com_user_id','=', 'u.user_id')
                ->leftJoin('user_attach as u_a', 'com_user_id','=','u_a.user_uid' )
                ->leftJoin('user as u1','com_reply_user_id','=','u1.user_id')
                ->select('c.*',
                    'u.*',
                    'u_a.user_portrait',
                    'u1.user_name as reply_user_name',
                    'u1.user_id as reply_user_id')
                ->orderBy('com_id','desc')

                ->get()->toArray();
        }

//        dd($comment);
////
////
////        // 得到评论的id
//        $commentId = [];
//        foreach ($comment as $index => &$item){
//            array_push($commentId, $item->com_id);
//            $item->reply_list = [];
//        }
////        dump($comment);
//        // 拿到评论下的回复
//        foreach ($commentID as $index => $val) {
//            $comment[$index]->reply_list = DB::table('comment as c')
//                ->select('c.*',
//                    'u_f.user_name as com_user_name',
//                    'uaf.user_portrait as com_user_portrait',
//                    'uas.user_portrait as reply_user_portrait',
//                    'u_s.user_name as reply_user_name')
//                ->where('c.com_type', 1)
//                ->where('c.com_article_id', $article->article_id)
//                ->where('c.com_superior', $val)
//                ->leftJoin('user as u_f', 'com_user_id', '=', 'u_f.user_id')
//                ->leftJoin('user_attach as uaf', 'com_user_id', '=', 'uaf.user_uid')
//                ->leftJoin('user as u_s', 'com_reply_user_id', '=', 'u_s.user_id')
//                ->leftJoin('user_attach as uas', 'com_reply_user_id', '=', 'uas.user_uid')
//                ->get()
//                ->toArray();
//        }

//
//


        $user = session()->get('user');



        //回复数 评论下的 回复
        foreach ($commentID as $index => $v){
            $comment[$index]->reply_count =DB::table('comment')
                ->where('com_article_id',$article->article_id)
                ->where('com_type',1)
                ->where('com_status',0)
                ->where('com_superior',$v)
                ->count();
        }

//        dd($comment);

        return view('home.comment.comment',compact(
            'user','article','author','articleClass','comment'));
    }

    //发表  评论
    public function publishComment(Request $request)
    {
//我撤回我以前说过的话， 仔细俺看看这本书还是不错的！
//值得一看
//        return 124454;
        $input = $request->all();



        $user = session()->get('user');

        $time = date('Y-m-d H-i-s' , time());

        if(empty($input['replyName'])){
            $arry = [
                'com_user_id' => $user->user_id,
                'com_article_id' => $input['article_id'],
                'com_content' => $input['com_content'],
                'com_create' => $time,
                'com_del_time' => $time,
            ];

            $res = DB::table('comment')
                ->insert($arry);

            if($res){
                $data = [
                    'status' => 200,
                    'message' => '评论添加成功'
                ];
            }else{
                $data = [
                    'status' => 201,
                    'message' => '评论添加失败'
                ];
            }
        }else{
            $resUser = DB::table('comment')
                ->join('user','com_user_id','=','user_id')
                ->join('article','com_article_id','=','article_id')
                ->where('user_name',$input['replyName'])
                ->where('article_id',$input['article_id'])
                ->first();

            if(!(empty($resUser->user_name))){

                $arry = [
                    'com_user_id' => $user->user_id,
                    'com_article_id' => $input['article_id'],
                    'com_content' => $input['com_content'],
                    'com_superior' => $resUser->com_id,
                    'com_type' => 1,
                    'com_create' => $time,
                    'com_del_time' => $time,
                ];

                $res = DB::table('comment')->insert($arry);
                if($res){
                    $data = [
                        'status' => 202,
                        'message' => '回复成功'
                    ];
                }else{
                    $data = [
                        'status' => 203,
                        'message' => '回复失败'
                    ];
                }
            }else{
                $data = [
                    'status' => 204,
                    'message' => '您输入的 用户名不存在'
                ];
            }
        }
        return $data;
    }

    // 评论回复
    public function replyCom(Request $request ){
        $input = $request->all();

//        dd($input);

        $user = session()->get('user');

        $time = date('Y-m-d H:i:s', time());
        $arry = [
            'com_user_id' => $user->user_id,
            'com_reply_user_id' => $input['com_user_id'],
            'com_article_id' => $input['article_id'],
            'com_type' => 1,
            'com_superior' => $input['com_superior'],
            'com_content' => $input['com_comment'],
            'com_create' => $time,
            'com_del_time' => $time
        ];

        $res = DB::table('comment')
            ->insert($arry);
        if($res){
            $data = [
                'status' => 200,
                'message' => '回复成功'
            ];
        }else{
            $data = [
                'status' => 500,
                'message' => '回复失败'
            ];
        }
        return $data;
    }

    //评论 回复 的 回复
    public function reply(Request $request)
    {
        $input = $request->all();

//        dd($input);

        $user = session()->get('user');

        $time = date('Y-m-d H:i:s', time());

        $arry = [
            'com_user_id' => $user->user_id,
            'com_reply_user_id' => $input['reply_user_id'],
            'com_article_id' => $input['article_id'],
            'com_type' => 1,
            'com_superior' => $input['com_superior'],
            'com_content' => $input['reply_comment'],
            'com_create' => $time,
            'com_del_time' => $time
        ];
//        dump($arry);

        $res = DB::table('comment')->insert($arry);

        if($res){
            $data = [
                'status' => 200,
                'message' => '回复成功'
            ];
        }else{
            $data = [
                'status' => 500,
                'message' => '回复失败'
            ];
        }
        return $data;
    }
}
