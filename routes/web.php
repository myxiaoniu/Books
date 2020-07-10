<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home/index');
});
//测试路由
Route::any('ceshi/ceshi','Ceshi\CeshiController@ceshi')->name('nihao');
//测试手机验证码
Route::get('ceshi/docode','Ceshi\CeshiController@docode');

//网站首页的路由
Route::any('home/index','Home\IndexController@index');

//注册验证
Route::post('home/doregister','Home\LoginController@doregister');
//登录
Route::post('home/login','Home\LoginController@login');
//退出登录
Route::any('home/loginout','Home\LoginController@loginout');

//发送手机验证码
Route::post('home/note','Home\LoginController@note');

//确认页面
Route::get('home/class/{id}','Home\IndexController@class');

//小说 主页面
Route::any('home/storyPage/{id}','Home\IndexController@storyPage');
//显示 小说章节内容
Route::any('home/chapterContent/{id}','Home\IndexController@chapterContent');
//上一章
Route::any('home/upChapter/{id}','Home\IndexController@upChapter');
//下一章
Route::any('home/downChapter/{id}','Home\IndexController@downChapter');
//目录
Route::any('home/catalog','Home\IndexController@upChapter');


//作家专区
Route::group(['prefix'=>'author','namespace'=>'Author' ],function (){
    Route::any('index','AuthorController@index');
    Route::any('doregister','AuthorController@doregister');
    Route::any('dologin','AuthorController@dologin');
    Route::any('loginout','AuthorController@loginout');

    //工作台
    Route::any('work','WorkController@work');
    //工作台，主页面
    Route::any('wel','WorkController@wel');

    //公共路由
    //文章信息修改
    Route::any('msgupdate/{id}','WorkController@msgupdate');
    // 图片上传
    Route::any('uploadimg','WorkController@uploadimg');
    //小说简介 名称修改
    Route::post('nameupdate','WorkController@nameupdate');
    //继续写作
    Route::any('writingPage/{id}','WorkController@writingpage');
    //新建章节页面
    Route::any('content/{id}','WorkController@content');
    //保存文章
    Route::post('savecontent','WorkController@savecontent');
    //作品管理页面
    Route::any('articleuppage/{id}','WorkController@articleuppage');
    //作品管理


    //已发布
    Route::any('yetIssue','WorkController@yetIssue');
    //文章下架
    Route::post('out/{id}','WorkController@out');
    //小说章节发布页面
    Route::any('articleChapterIssuePage/{id}','WorkController@articleChapterIssuePage');
    //小说章节回收页面
    Route::any('articlehuishou/{id}','WorkController@articlehuishou');
    //小说章节发布
    Route::post('addIssue','WorkController@addIssue');
    //小说章节回收
    Route::post('delIssue','WorkController@delIssue');
    //小说连载
    Route::post('lianzai/{id}','WorkController@lianzai');
    //小说完结
    Route::post('wanjie/{id}','WorkController@wanjie');




    //文章目录结构
    Route::any('chapter/{id}','WorkController@chapter');
    //文章修改
    Route::post('saveupcontent','WorkController@saveupcontent');

    //新建小说
    Route::any('createArticle','WorkController@createArticle');
    //保存小说
    Route::post('saveArticle','WorkController@saveArticle');

//    //小说发布页面
//    Route::any('issue','WorkController@issue');
//    //小说发布
//    Route::any('articleIssue','WorkController@articleIssue');
//    //章节发布页面
//    Route::any('chapterPage','WorkController@chapterPage');
//    //章节发布
//    Route::any('chapterIssue','WorkController@chapterIssue');

    //未发布
    //未发布页面
    Route::any('noIssuePage','WorkController@noIssuePage');
    //小说发布
    Route::post('put/{id}','WorkController@put');
    //小说章节删除
    Route::post('delarticle','WorkController@delarticle');

});

//没有登录跳转页面
Route::any('user/login','User\UserController@login');

//用户 相关
Route::group(['prefix'=>'user','namespace'=>'User','middleware'=>'isLogin'],function (){


    //小说购买页面
    Route::any('chapterPurchasesPage/{id}','UserController@chapterPurchasesPage');

    //小说购买
    Route::post('chapterPurchases','UserController@chapterPurchases');

    //添加书架
    Route::any('addBookrack','UserController@addBookrack');
});

//小说 评论
Route::group(['prefix'=>'comment', 'namespace'=>'Comment'],function (){
    // 小说 评论 页面
    Route::any('commentPage/{id}','ComController@commentPage');

    //小说发表 评论 回复
    Route::post('publishComment','ComController@publishComment');

    // 评论 回复
    Route::post('replyCom','ComController@replyCom');
    // 评论 回复 的 回复
    Route::post('reply','ComController@reply');


});


//小说--章节 评论

