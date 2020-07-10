<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $user = session()->get('user');
//        $user_name = $user->user_name;

        //获取全部小说分类
        $articleClass = DB::table('class')->where('class_status','=',0)->get();

        //获取当前时间
        $time = date('Y-m-d H-i-s', time());

        //获取小说封面  轮播
        $number = [0,1,2,3,4,5,6,7,8,9,10,11];


        return view('home.index',compact('user', 'articleClass','time','number'));
    }

    // 确认是那个页面
    public function class($id)
    {
        $user = session()->get('user');
        //获取全部小说分类
        $articleClass = DB::table('class')->where('class_status','=',0)->get();

        //根据 传过来的 id  查询分类名称
        $classFather = DB::table('class')->where('class_id',$id)->first();
        $classOne = DB::table('class')->where('class_id',$classFather->class_superior)->first();

        //查询当前分类下的所有小说信息  只查看  作者上传的  发布时间
        $article = DB::table('article')->where('article_class_id',$id)
            ->where('article_status',1)->get();

        //查询出  作者   更新时间  最新章节
        $articleMsg = DB::table('article')
            ->join('author', 'article_author_id','=','author_id')
            ->join('content','article_id','=','c_article_id')
            ->join('class','article_class_id',$id)
            ->select('c_chapter_title')->orderBy('con_id','desc');




        return view('home.classArticle',compact(
            'user','articleClass','classFather','classOne','article','articleMsg'));
    }

    //小说 阅读主页面
    public function storyPage($id)
    {
       $user = session()->get('user');
        //获取全部小说分类
       $articleClass = DB::table('class')->where('class_status','=',0)->get();

        //根据 传过来的 id  查询分类名称
       $article = DB::table('article')->where('article_id',$id)->first();
       $classTwo = DB::table('class')->where('class_id',$article->article_class_id)->first();
       $classOne = DB::table('class')->where('class_id',$classTwo->class_superior)->first();

       //作者 信息
       $author = DB::table('author')->where('author_id',$article->article_author_id)->first();

       //小说总字数
//        $articleFontCount = DB::table('content')
//            ->where('c_article_id',$id)
//            ->pluck('c_chapter_title')
//            ->get();



         //小说 收费   把免费的  和 收费的  章节分开
            $noMoney = DB::table('content')
                ->where('c_article_id',$id)
                ->where('c_money','=',0)
                ->where('c_status',1)
                ->get();
            $charge = DB::table('content')
                ->where('c_article_id',$id)
                ->where('c_money','!=',0)
                ->where('c_status',1)
                ->get();
        return view('home.article.storyPage',compact('user','articleClass','article',
            'classOne','classTwo','author','noMoney','charge'));
    }

    //小说 章节 内容
    public function chapterContent($id)
    {
        $user = session()->get('user');
        $chapterId = $id;


        //查看  章节信息
        $chapter = DB::table('content')
            ->where('con_id',$id)
            ->first();



        //获取本章小说的内容  并且判断是否购买
        if(!(empty($user))){
            $orders = DB::table('order')
                ->where('order_user_id',$user->user_id)
                ->where('order_article_id',$chapter->c_article_id)
                ->where('order_chapter_id',$id)
                ->first();
            return view('home.article.chapterContent',compact('orders','chapter','user'));
        }else{
            return view('home.article.chapterContent',compact('chapter'));
        }
    }

    //小说 章节 内容

    //上一章
    public function upChapter($id)
    {
        $user = session()->get('user');


        $chapterInfo = DB::table('content')
            ->where('con_id',$id)
            ->first();

        $chapterNoMoneyIdMin = DB::table('content')->where('c_article_id',$chapterInfo->c_article_id)
            ->first();

        if($chapterNoMoneyIdMin->con_id > $id - 1){
            $chapterId = $id ;
        }else{
            $chapterId = $id - 1;
        }

        $chapter = DB::table('content')
            ->where('con_id',$chapterId)
            ->first();


        if(!(empty($user))){
            $orders = DB::table('order')
                ->where('order_user_id',$user->user_id)
                ->where('order_article_id',$chapter->c_article_id)
                ->where('order_chapter_id',$chapterId)
                ->first();
            return view('home.article.chapterContent',compact('chapter','user','orders'));

        }
        //获取本章小说的内容  并且判断是否购买
        return view('home.article.chapterContent',compact('chapter'));
    }

    //下一章
    public function downChapter($id)
    {
        $user = session()->get('user');
//        dd($id);

        $chapterId = $id + 1;
//        dd($chapterId);
        //查看  章节信息
        $chapter = DB::table('content')
            ->where('con_id',$chapterId)
            ->first();



        if(!(empty($user))){
            $orders = DB::table('order')
                ->where('order_user_id',$user->user_id)
                ->where('order_article_id',$chapter->c_article_id)
                ->where('order_chapter_id',$chapterId)
                ->first();
            return view('home.article.chapterContent',compact('user','orders','chapter'));
        }else{
            $chapterNoMoneyIdBig = DB::table('content')->where('c_article_id',$chapter->c_article_id)
                ->where('c_money',0)->orderBy('con_id','desc')->first();
//        dd($chapterNoMoneyIdBig->con_id);

            if($chapterNoMoneyIdBig->con_id < $chapterId){
                return view('home.article.login');
            }

        }
        //获取本章小说的内容  并且判断是否购买


        return view('home.article.chapterContent',compact('chapter'));
    }

    //小说目录

    public function catalog()
    {
        return redirect('home/storyPage/{id}');
    }


}
