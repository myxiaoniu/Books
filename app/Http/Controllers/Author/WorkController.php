<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use ClassesWithParents\D;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    public function work()
    {
        $author = session()->get('author');
        return view('author.work.index',compact('author'));
    }

    //跳转工作台主页面
    public function wel()
    {
        $author = session()->get('author');
        return view('author.work.welcome',compact('author'));
    }

    //已发布页面
    public function yetIssue()
    {
        //查询当前作家 创建的小说
        $author = session()->get('author');
        $article = DB::table('article')->where('article_author_id',$author->author_id)->where('article_status','=',1)->get();
//        dd($user->article_id);
        //最新章节
        $contentTitle = [];
        foreach ( $article as $v){
            $contentTitle[] = DB::table('content')->where('c_article_id',$v->article_id)->where('c_status','=',1)->orderBy('con_id','desc')->first();
        }


        return view('author.work.yetIssue',compact('article','author','contentTitle'));
    }

    //小说连载
    public function lianzai($id)
    {
        $res = DB::table('article')->where('article_id',$id)->update(['article_type'=>0]);
        if($res){
            $data = [
                'status' => 200,
                'message' => '请再接再厉，已更改为连载状态'
            ];
        }else{
            $data = [
                'status' => 201,
                'message' => '修改状态失败'
            ];
        }
        return $data;
    }

    //小说完结
    public function wanjie($id)
    {
        $res = DB::table('article')->where('article_id',$id)->update(['article_type'=>1]);
        if($res){
            $data = [
                'status' => 200,
                'message' => '请再接再厉，奥日写出下一篇作品,'
            ];
        }else{
            $data = [
                'status' => 201,
                'message' => '修改状态失败'
            ];
        }
        return $data;
    }

    //作品下架
    public function out($id)
    {
        $res = DB::table('article')->where('article_id',$id)->update(['article_status'=>0]);
        DB::table('content')->where('c_article_id',$id)->update(['c_status'=>0]);
        if($res){
            $data = [
                'status' => 200,
                'message' => '小说，下架成功, 请点击刷新按钮'
            ];
        }else{
            $data = [
                'status' => 300,
                'message' => '小说下架失败'
            ];
        }
        return $data;
    }

    //小说章节发布页面
    public function articleChapterIssuePage($id)
    {
        //小说信息
        $article = DB::table('article')->where('article_id',$id)->first();

        //未发布总章数
        $noCount = DB::table('content')->where('c_article_id',$id)->where('c_status',0)->count();

        //小说未发布章节信息
        $chapterNo = DB::table('content')->where('c_article_id',$id)->where('c_status', 0 )->paginate(6);

        return view('author.work.articleChapterIssuePage',compact('article','noCount','chapterNo'));
    }

    //小说章节发布
    public function addIssue(Request $request)
    {
        $input = $request->all();

        $res = DB::table('content')->where('con_id',$input['ids'])->update(['c_status'=>1]);
        if($res){
            $data = [
                'status' => 200,
                'message' => '发布成功'
            ];
        }else{
            $data = [
                'status' => 201,
                'message' => '发布失败'
            ];
        }
        return $data;
    }

    //小说章节回收页面
    public function articlehuishou($id)
    {
        //小说信息
        $article = DB::table('article')->where('article_id',$id)->first();

        //以发布总章数
        $yesCount = DB::table('content')->where('c_article_id',$id)->where('c_status',1)->count();

        //小说以发布章节信息
        $chapterYes = DB::table('content')->where('c_article_id',$id)->where('c_status', 1 )->paginate(6);

        return view('author.work.articlehuishou',compact('article','yesCount','chapterYes'));
    }

    //小说章节回收
    public function delIssue(Request $request)
    {
        $input = $request->all();
        //查看 下架的章节数量
        $num = count($input['ids']);

        //判断 小说总共发布了多少章， 发布章数底线是  100
        $issueNum = DB::table('content')->where('c_article_id',$input['article_id'])->where('c_status',1)->count();

        if(($issueNum - $num) < 100){
            $data = [
                'status' => 201,
                'message' => '小说发布需要有100章，所以不能下架这些章节'
            ];
        }else{
            $res = DB::table('content')->where('con_id',$input['ids'])->update(['c_status'=>0]);
            if($res){
                $data = [
                    'status' => 200,
                    'message' => '小说章节，回收成功'
                ];
            }else{
                $data = [
                    'status' => 202,
                    'message' => '小说章节，回收失败'
                ];
            }
        }

        return $data;
    }

    //作品信息修改
    public function msgupdate($id)
    {
        //小说信息
        $article = DB::table('article')->where('article_id',$id)->first();

        //查询当前小说的 信息
        $article = DB::table('article')->where('article_id',$id)->first();

        return view('author.work.article_msg_update',compact('article'));
    }

       //小说简介  名称修改
    public function nameupdate(Request $request)
    {
        //接受数据
        $input = $request->all();
//        dd($input);

        //查看修改的书名是否存在
        $article_up = DB::table('article')->where('article_title',$input['article_title'])->first();

        //如果数据库中存在
        if($article_up){
            //判断是否更改
            if($article_up->article_id == $input['article_id']){
                $arry = [
                'article_title' => $input['article_title'],
                'article_content' => $input['article_content']
                ];
//            dd(23123412412);
                $res = DB::table('article')->where('article_id',$input['article_id'])->update($arry);
                if($res){
                    $data = [
                        'status' => 200,
                        'message' => '修改成功'
                    ];
                }else{
                    $data = [
                        'status' => 300,
                        'message' => '修改失败'
                    ];
                }
            }else{
                $data = [
                'status' => 400,
                'message' => '此著作已存在'
            ];
            }
        }else{
            $arry = [
                'article_title' => $input['article_title'],
                'article_content' => $input['article_content']
            ];

            $res = DB::table('article')->where('article_id',$input['article_id'])->update($arry);
            if($res){
                $data = [
                    'status' => 200,
                    'message' => '修改成功'
                ];
            }else{
                $data = [
                    'status' => 300,
                    'message' => '修改失败'
                ];
            }
        }
        return $data;
    }

    //继续写作
    public function writingPage($id)
    {
        // 根据小说  id  找到小说的所有信息
        $article = DB::table('article')->where('article_id',$id)->first();

//        dd($article->article_portrait);

        $catalog = DB::table('content')->where('c_article_id',$id)->orderBy('con_id','desc')->get();

        return view('author.work.writingPage',compact('article','catalog'));

    }

    //新建文章页面
    public function content($id)
    {
        return view('author.work.content',compact('id'));
    }

    //文章保存
    public function savecontent(Request $request)
    {
//        return 11233434;
        //获取前台传过来的数据
        $input = $request->all();
//        dd($input);

        //判断章节是否收费

        if(!empty($input['article_money'])){

            $money = $input['article_money'];    // 小说章节收费价格

        }else{
            $money = '0';
        }

        //小说 更新时间
        $time = date('Y-m-d H-i-s',time());
        //存储到数据库中
        $arry = [
            'c_article_id'       => $input['article_id'],            // 小说id
            'c_chapter_title'    => $input['article_title'],         // 小说章节名称
            'c_content'          => $input['article_content'],       // 小说章节内容
            'c_create'           => $time,                           // 小说更新时间
            'c_money'            => $money,
        ];

        $res = DB::table('content')->insert($arry);

        //小说是否保存成功
        if($res){
            $data = [
                'status'=>200,
                'message'=>'文章保存成功'
            ];
        }else{
            $data = [
                'status'=>300,
                'message'=>'文章保存失败'
            ];
        }
        return $data;
    }
//
    //文章目录
    public function chapter($id)
    {
        // $id 为小说章节id
//        return 1324235;
        $chapter = DB::table('content')->where('con_id',$id)->first();
//        dd($chapter->c_chapter_title);
        return view('author.work.upcontent',compact('chapter'));
    }

    //文章修改
    public function saveupcontent(Request $request)
    {
        $input = $request->all();
        if(!empty($input['article_money'])){
            $money = $input['article_money'];
        }else{
            $money = '';
        }
        $arry = [
            'c_chapter_title' => $input['article_title'],
            'c_content' => $input['article_content'],
            'c_money' => $money
        ];

        $res = DB::table('content')->where('con_id',$input['con_id'])->update($arry);
        if($res){
            $data = [
                'status' => 200,
                'message' => '修改成功'
            ];
        }else{
            $data = [
                'status' => 300,
                'message' => '修改失败'
            ];
        }
        return $data;
    }





    //图片上传
///2020-06-27/kTunCZYTDoLfTKt85Vd6e8FiB4rIsFpoNfLP5CEq.jpeg
    public function uploadimg(Request $request)
    {
        //date('Y-m-d'),$input['tupian']->hashName()
        if($request->isMethod('POST')){
            $input = $request->all();
            $filname = date('Y-m-d');
            $name = $input['tupian']->hashName();
            $info = $input['tupian']->move('image/cover/'.$filname,$name);

            $path = '/image/cover/'.$filname. '/'.$name;
//            dd($info);
            if($info){
                DB::table('article')->where('article_id',$input['article_id'])->update(['article_portrait'=>$path]);
                return '成功';
            }else{
                return '失败';
            }

        }

//            dd($_FILES);
//            return 2342354235;
//            $tmp = $request->all();
////            dd($tmp);
//            $path = '/image/cover'; //public下的article
//            if ($tmp->isValid()) { //判断文件上传是否有效
//                $FileType = $tmp->getClientOriginalExtension(); //获取文件后缀
////                dd($FileType);
//                $FilePath = $tmp->getRealPath(); //获取文件临时存放位置
//
//                $FileName = date('Y-m-d') . uniqid() . '.' . $FileType; //定义文件名
//
//                Storage::disk('article')->put($FileName, file_get_contents($FilePath)); //存储文件
//
//                $data = [
//                    'status' => 0,
//                    'path' => $path . '/' . $FileName //文件路径
//                ];
//
//            }

//        $file = $request->file("image");//接前台图片
//        $fil = $file->getClientOriginalName();//图片路径
//        $data = $file->move("img",$fil);//移动至框架图片文件夹
//        $dat['image']=$data;
//
//        $res = DB::table("goods")->insert($dat);
//
//        if ($res){
//            echo "添加成功";
//        }else{
//                echo "添加失败";
//        }

    }



    //新建小说
    public function createArticle()
    {
        //小说分类
        $articleClass = DB::table('class')->where('class_status', '=' ,0)->get();
        return view('author.work.createArticle',compact('articleClass'));
    }

    //保存小说
    public function saveArticle(Request $request)
    {
//        return 23542352;
        //获取作者id
        $author = session()->get('author');
        $authorID = $author->author_id;

        //接受数据
        $input = $request->all();

        //判断数据库中该小说是否存在
        $article = DB::table('article')->where('article_title',$input['article_title'])->first();

        if($article){
            $data = [
                'status' => 201,
                'message' => '真可惜，这么好的名字已经被注册了，请加油再想一个吧，作者大人'
            ];
        }else{

            $time = date('Y-m-d H-i-s', time());
            $arry = [
                'article_class_id' => $input['article_class'],
                'article_title'    => $input['article_title'],
                'article_content'  => $input['article_content'],
                'article_author_id'=> $authorID,
                'article_create'   => $time
            ];

            $res = DB::table('article')->insert($arry);
            if($res){
                $data = [
                    'status' => 200,
                    'message'=> '大神，您的小说创建成功了'
                ];
            }else{
                $data = [
                    'status' => 202,
                    'message'=> '大神，您的小说创建失败了'
                ];
            }
        }
        return $data;
    }

    //小说未发布页面
    public function noIssuePage()
    {
        $author = session()->get('author');
        $article = DB::table('article')->where('article_author_id',$author->author_id)->where('article_status',0)->get();

        return view('author.work.noIssuePage',compact('article','author'));
    }

    //小说发布
    public function put($id)
    {
        //查看小说是否有100 章， 没有则不能发布
        $article = DB::table('content')->where('c_article_id',$id)->count();

        if($article <= 100){
            $data = [
                'status' => 201,
                'message' => '尊敬的作者大人，小说上传需要有 100 章，您的这部小说似乎还不太够，请再接再厉'
            ];
        }else{
            $res = DB::table('article')->where('article_id',$id)->update(['article_status' => 1]);
            DB::table('content')->where('c_article_id',$id)->offset(0)->limit(100)->update(['c_status'=>1]);
            if($res){
                $data = [
                    'status' => 200,
                    'message' => '小说上传成功，请再接再厉!'
                ];
            }else{
                $data = [
                    'status' => 202,
                    'message' => '小说上传失败'
                ];
            }
        }
        return $data;
    }

    //作品管理页面
    public function articleuppage($id)
    {
        //小说信息
        $article = DB::table('article')->where('article_id',$id)->first();

        //小说中的最后一章
        $lastContent = DB::table('content')->where('c_article_id',$id)->orderBy('con_id','desc')->first();

        return view('author.work.articleuppage',compact('article','lastContent'));
    }

    //小说章节删除
    public function delarticle(Request $request)
    {
        $input = $request->all();

        $res = DB::table('content')->where('con_id',$input['con_id'])->delete();
        if($res){
            $data = [
                'status' => 200,
                'message' => '删除成功'
            ];
        }else{
            $data = [
                'status' => 201,
                'message' => '删除失败'
            ];
        }
        return $data;
    }

}
