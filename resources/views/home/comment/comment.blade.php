<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- 引入页面描述和关键字模板 -->
    <title>全书网</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- 禁止浏览器初始缩放 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <!-- 引入主题样式表 -->
    <link rel="stylesheet" type="text/css" href="/home/css/style.css" />
    <!-- 引入主题响应式样式表-->
    <link rel="stylesheet" type="text/css" href="/home/css/responsive.css" />
    <!-- 引入自定义样式表 -->
    <link rel="stylesheet" type="text/css" href="/home/css/custom.css" />
    <!-- 引入字体样式表-->
    <link rel="stylesheet" type="text/css" href="/home/css/font-awesome.css" media="all" />


    <link rel="stylesheet" href="/author/css/font.css">

    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/author/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/author/js/xadmin.js"></script>
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <script type="text/javascript" src="/home/js/jquery.min.js?ver=4.3.6"></script>

    <script type="text/javascript" src="/home/js/lazyload.js"></script>
    <!-- IE Fix for HTML5 Tags -->
    <!--[if lt IE 9]>
    <script src="/home/js/html5.js"></script>
    <script src="/home/js/css3-mediaqueries.js"></script>
    <script src="/home/js/PIE_IE678.js"></script>
    <link rel="stylesheet" type="text/css" href="/home/css/iefix.css"  media="all" />
    <![endif]-->
    <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="/home/css/font-awesome-ie7.min.css"  media="all" />
    <![endif]-->
    <!--[if IE 6]>
    <script src="/home/js/kill-IE6.js"></script>
    <![endif]-->
</head>
<body id="wrap" class="page page-id-25 page-template-default">
<!-- Nav -->
<!-- Moblie nav-->
<div id="body-container">
    <aside id="navmenu-mobile">
        <div id="navmenu-mobile-wraper">
            <div class="mobile-login-field">
                <div id="login-box-mobile">
                    <div class="login-box-mobile-form">
                        <button data-sign="0" class="btn btn-primary user-login">登录</button>
                        <button data-sign="1" class="btn btn-success user-reg">注册</button>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!-- /.Moblie nav -->
    <section id="content-container" style="background:#f1f4f9; ">
        <header class="header-wrap" id="nav-scroll">
            <div class="nav-wrap">
                <div class="logo-title">
                    <a href="{{url('home/index')}}" alt="全书网" title="全书网"> 全书网 </a>
                </div>
                <!-- Toggle menu -->
                <div class="toggle-menu">
                    <i class="fa fa-bars"></i>
                </div>



                {{--         判断用户是否登录--}}
                @if(empty($user->user_name))
                    <div id="login-reg">
                        <span data-sign="0" id="user-login" class="user-login ie_pie only-login"> 登录</span>
                    </div>
                    <div id="login-reg">
                        <span data-sign="1" id="user-login" class="user-login ie_pie only-login"> 注册</span>
                    </div>
                @else
                    <span style="color: white; font-size: 20px ;  margin-left: 300px" >欢迎：{{$user->user_name}}</span>
                    <a href="" style="color: white; font-size: 20px ;  margin-left: 40px">个人中心</a>
                    <a href="{{url('home/loginout')}}" style="color: white; font-size: 20px;margin-left: 40px">退出登录</a>
                @endif


                <nav id="primary-navigation" class="site-navigation primary-navigation " role="navigation">
                    <div class="menu-%e9%a1%b6%e9%83%a8%e8%8f%9c%e5%8d%95-container">
                        <ul id="menu-%e9%a1%b6%e9%83%a8%e8%8f%9c%e5%8d%95" class="nav-menu">
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-4324"><a href="{{url('home/index')}}">首页</a></li>
                        </ul>
                    </div>
                </nav>
                <!-- Menu Items End -->
            </div>
            <div class="clr"></div>
            <div class="site_loading"></div>
        </header>
        <div class="hidefixnav"></div>
        <!-- End Nav -->
        <script type="text/javascript">
            $('.site_loading').animate({'width':'33%'},50);  //第一个进度节点
        </script>
        <div class="breadcrumbs" >
            <div class="container clr">
                <div id="breadcrumbs">
                    <h1><i class="fa fa-bookmark"></i>&nbsp;评论区</h1>
                    <h3>自古评论出人才</h3>
                </div>
            </div>

        </div>
        <!-- Header Banner -->
        <!-- /.Header Banner -->
        <!-- Main Wrap -->
        <div id="main-wrap" >
            <div id="single-blog-wrap" class="container two-col-container" style="margin-left: 200px">
                <div id="main-wrap-left">
                    <!-- 需要被评论的内柔 -->
                    <div class="content"  >
                        <div style="margin-left: 300px">
                            <h1 style="color: #00aeef">{{$article->article_title}}</h1>
                            <span>作者：{{$author->author_name}}</span><br/><br/>
                            <span>类型：{{$articleClass->class_name}}</span>
                        </div>


                    </div>
{{--                    评论  区--}}
                    <div class="comments-main">
                        <div id="respond_box">
                            <div style="margin:8px 0 8px 0">
                                <h3 class="multi-border-hl"><span>发表评论</span></h3>
                            </div>
                            <div id="respond">
                                <div class="cancel-comment-reply" style="margin-bottom:5px">
                                    <small><a rel="nofollow" id="cancel-comment-reply-link" href="/liuyan#respond" style="display:none;">点击这里取消回复。</a></small>
                                </div>
                                <div id="commentform" >
                                    <div class="clear"></div>
                                    <div class="comt-box">
                                        <input type="hidden" id="article_id" value="{{$article->article_id}}">

                                        <textarea name="comment" id="comment" tabindex="5" rows="5" placeholder="说点什么吧..." required=""></textarea>
                                        <div class="comt-ctrl">

                                            @if(empty($user->user_name))
                                                <button style="margin-left: 700px" class="submit btn btn-submit"  type="submit"  tabindex="6">
                                                    <i class="fa fa-check-square-o"></i>
                                                    <a rel="nofollow" class="comment-reply-login user-login" href="javascript:" style="color: white">
                                                        登录后评论
                                                    </a>
                                                </button>
                                            @else
                                                <button class="submit btn btn-submit" style="margin-left: 700px" type="submit" id="button" tabindex="6">
                                                    <i class="fa fa-check-square-o"></i> 提交评论
                                                </button>
                                            @endif
                                            <span class="reply">  </span>
                                        </div>

                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="commenttitle">
                            <a href="#normal_comments"><span id="comments" class="active"><i class="fa fa-comments-o"></i>  评论</span></a>

                        </div>
{{--                        评论区--}}
                        <ol class="commentlist" id="normal_comments">
                            @if(empty($comment[0]->com_id))
                                <span>暂时没有评论</span>
                            @else
                                @foreach($comment as $key=> $val)


                                    <li class="comment even thread-even depth-1">
                                        <div  class="comment-body">
                                            <img src="{{$val->user_portrait}}?s=54&amp;d=wavatar&amp;r=g" class="avatar" width="54" height="54" />
                                            <span class="floor"> #{{$val->reply_count}} 条回复 </span>
                                            <div class="comment-main">
                                                <p>{{$val->com_content}}</p>
                                                <div class="comment-author">
                                                    <div class="comment-info">
                                                        <span class="comment_author_link"> {{$val->user_name}} </span>
                                                        <span class="comment_author_vip tooltip-trigger" title="作者"><span class="vip vip-author">作 者</span></span>
                                                        <span class="datetime"> {{$val->com_create}} </span>
                                                        @if(empty($user->user_name))
                                                            <span class="reply"> <a rel="nofollow" class="comment-reply-login user-login" href="javascript:">登录以回复</a> </span>
                                                        @else
{{--                                                            <input type="hidden" id="com_user_id" value="{{$val->com_user_id}}">--}}
{{--                                                            <input type="text" class="com_superior" value="{{$val->com_id}}">--}}
                                                            <button  class="btn btn-default"  onclick="commentReply(this)"  com_user_id="{{$val->com_user_id}}" com_superior="{{$val->com_id}}"  >回复他：</button>

                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                                <div>
                                                    <input type="submit" class="bin" nums="{{$key}}" onclick="showBin(this)" value="展示评论">
                                                </div>
                                            </div>

                                        </div>
                                        <ul class="children" >
                                            @foreach($val->reply_list as $v)
                                                <li class="comment byuser comment-author-tyuan629 bypostauthor odd alt depth-2" >
                                                    <div class="comment-body">
                                                        <img src="{{$v->user_portrait}}" class="avatar" width="54" height="54" />
                                                        <span class="floor"> </span>
                                                        <div class="comment-main">
                                                            <p><a class="at_parent_comment_author" >@ {{$v->reply_user_name}} </a> {{$v->com_content}} </p>
                                                            <div class="comment-author">
                                                                <div class="comment-info">
                                                                    <span class="comment_author_link"><a  class="name"> {{$v->user_name}} </a></span>
                                                                    <span class="comment_author_vip tooltip-trigger" title="评论达人 LV.1"><span class="vip vip1">评论达人 LV.1</span></span>
                                                                    <span class="datetime"> {{$v->com_create}} </span>
                                                                    @if( empty($user->user_name))
                                                                        <span class="reply"> <a rel="nofollow" class="comment-reply-login user-login" href="javascript:">登录以回复</a> </span>
                                                                    @else
{{--                                                                        <input type="hidden" id="reply_user_id"  value="{{$v->reply_user_id}}">--}}
{{--                                                                        <input type="text" class="reply_superior" value="{{$v->com_superior}}">--}}
{{--                                                                        <span  class ="reply123" > 回复他： </span>--}}
                                                                        <button class="btn btn-default" value="回复" reply_user_id="{{$v->user_id}}" reply_superior="{{$v->com_superior}}" onclick="replyReply(this)">回复他：</button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div> </li>
                                            @endforeach
                                        </ul>
                                        <!-- .children --> </li>

                                @endforeach
                            @endif
                        </ol>
                    </div>
                    <!-- /.Comments -->
                </div>
                <!-- Sidebar -->
                <script type="text/javascript">
                   function showBin(obj){
                       var nums = $(obj).attr("nums");

                       var btn = document.getElementsByClassName('btn')[nums];
                       var showDiv = document.getElementsByClassName('children')[nums];
                       function out(){
                           btn.onclick = function(){

                               btn.innerHTML = "收起";
                               showDiv.style.display = 'block';



                               btn.onclick = function(){
                                   btn.innerHTML = "展示";
                                   showDiv.style.display = 'none';

                                   out();


                               }
                           }
                       
                       out();

                   }

                    $('.site_loading').animate({'width':'55%'},50);  //第二个节点
                </script>

{{--                发表评论--}}
                <script type="text/javascript">
                    $('#button').click(function(){
                        var com_content = $('#comment').val();
                        var article_id = $('#article_id').val();

                        $.post('/comment/publishComment',
                            {'com_content':com_content, 'article_id':article_id,},
                            function (data) {
                                console.log(data);
                                if(data.status == 200){
                                    layer.msg(data.message, {icon:6, time:2000},function(){
                                        parent.location.reload(true);
                                    })
                                }else if(data.status == 202){
                                    layer.msg(data.message, {icon:6, time:2000},function () {
                                        parent.location.reload(true);
                                    });
                                }else if(data.status == 201){
                                    layer.msg(data.message, {icon:5, time:2000});
                                }else if(data.status == 203){
                                    layer.msg(data.message, {icon:5, time:2000});
                                }else{
                                    layer.msg(data.message, {icon:5, time:2000});
                                }
                            })
                    })


                </script>
{{--                回复 评论    弹窗--}}
                <script type="text/javascript">
                    function commentReply(obj){

                        var com_user_id = $(obj).attr("com_user_id");
                        var article_id = $('#article_id').val();
                        var com_superior = $(obj).attr("com_superior");
                        layer.open({
                            type: 1,
                            title: ' 回复',
                            area: ['500px', '300px'],

                            content: '<div >' +
                                '<textarea style="height: 240px;width: 480px;font-size: 2em;text-indent:2em " name="comment" id="com_comment" tabindex="5" rows="5" placeholder="说点什么吧..." required=""></textarea> ' +

                                '</div>',
                            btn: ['提交评论'],
                            yes: function(index, layero){
                                var com_comment = $('#com_comment').val();
                                if(com_comment == ''){
                                    layer.msg('回复不可以为空哦！');
                                    return false;
                                }
                                $.post('/comment/replyCom',
                                    {'com_user_id':com_user_id,'article_id':article_id,'com_comment':com_comment,'com_superior':com_superior},
                                        function(data){
                                        console.log(data);
                                        if(data.status == 200){
                                            layer.msg(data.message, {icon:6, time:2000},function () {
                                                parent.location.reload(true);
                                            });
                                        }else{
                                            layer.msg(data.message, {icon:5, time:2000});
                                        }
                                    })
                            },
                        });
                    }
                </script>
{{--                回复 评论 中的 回复    弹窗--}}
                <script type="text/javascript">
                    function replyReply(obj){
                        var reply_user_id = $(obj).attr("reply_user_id");
                        var article_id = $('#article_id').val();
                        var com_superior = $(obj).attr("reply_superior");
                        layer.open({
                            type: 1,
                            title: ' 回复',
                            area: ['500px', '300px'],
                            btn: ['提交评论'],
                            yes: function(index, layero){
                                var reply_comment = $('#reply_comment').val();
                                if(reply_comment == ''){
                                    layer.msg('回复不可以为空哦！');
                                    return false;
                                }
                                $.post('/comment/reply',
                                    {'reply_user_id':reply_user_id,'article_id':article_id,'reply_comment':reply_comment,'com_superior':com_superior},
                                    function(data){
                                        console.log(data);
                                        if(data.status == 200){
                                            layer.msg(data.message, {icon:6, time:2000},function () {
                                                parent.location.reload(true);
                                            });
                                        }else{
                                            layer.msg(data.message, {icon:5, time:2000});
                                        }
                                    })
                            },
                            content: '<div >' +
                                '<textarea style="height: 260px;width: 480px;font-size: 2em;text-indent:2em " name="comment" id="reply_comment" tabindex="5" rows="5" placeholder="说点什么吧..." required=""></textarea> ' +
                                '</div>',
                        });
                    }
                </script>


                <script type="text/javascript">
                    //获取元素
                    var key = $('#xianshi').val();
                    var btn = document.getElementsByName('btn')[key];
                    var showDiv = document.getElementsByName('show')[key];
                    //添加点击事件
                    function out(){

                        btn.onclick = function(){
                            console.log(key);
                            btn.innerHTML = "展开";
                            showDiv.style.display = 'none';
                            btn.onclick = function(){
                                btn.innerHTML = "隐藏";
                                showDiv.style.display = 'block';

                                out();
                            }
                        }
                    }
                    out();
                </script>
{{--评论区  jquery--}}


{{--                右侧   搜索  标签--}}


                <script type="text/javascript">
                    $('.site_loading').animate({'width':'78%'},50);  //第三个节点
                </script>
                <!-- /.Sidebar -->
            </div>
        </div>
        <!--/.Main Wrap -->
        <!-- Bottom Banner -->
        <div style="height:50px;"></div>
        <!-- /.Bottom Banner -->
        <!-- Footer -->
        <!-- Footer Wrap -->
        <div class="separator"></div>
        <div id="footer-wrap">
            <div id="footer" class="layout-wrap">
                <!-- Footer Widgets -->
                <div id="footer-widgets">
                </div>
                <div class="clr"></div>
                <!-- /.Footer Widgets -->
            </div>
        </div>
{{--        页脚--}}


        <footer id="footer-nav-wrap">
            <div id="footer-nav" class="layout-wrap">
                <div id="footer-nav-left">
                    <!-- Footer Nav -->
                    <!-- /.Footer Nav -->
                    <!-- Copyright -->
                    <div id="footer-copyright">
                        &copy; 2013 - 2016
                        <a target="_blank" rel="nofollow" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=53230102000151" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;"><img src="images/beiantubiao.png" style="float:left;" />滇公网安备 53230102000151号</a>&nbsp;|&nbsp;Theme by&nbsp;
                        <a href="http://www.zhiyanblog.com/tinection.html" target="_blank">Tinection</a>. &nbsp;|&nbsp; &nbsp;|&nbsp;
                        <a href="http://www.miitbeian.gov.cn/" target="_blank">滇ICP备14001375号-1</a>
                        <!--52 queries in 1.114 seconds.-->
                    </div>
                    <!-- /.Copyright -->
                </div>
                <div id="footer-nav-right">
                    <!--  links -->
                    <div id="footer-links-icons">
                        <span class="footer-wordpress-link"> <a href="http://wordpress.org" target="_blank" rel="nofollow" class="wordpress"> <span class="tinicon-wordpress"><i class="fa fa-wordpress"></i></span> <br />WordPress </a> </span>
                        <span class="footer-sinaweibo-link"> <a href="http://weibo.com/iydu" target="_blank" rei="nofollow" class="sinaweibo"> <span class="tinicon-sinaweibo"><i class="fa fa-weibo"></i></span> <br />Weibo </a> </span>
                        <span class="footer-qq-link"> <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=55002834&amp;site=qq&amp;menu=yes" target="_blank" rei="nofollow" class="qq"> <span class="tinicon-qq"><i class="fa fa-qq"></i></span> <br />QQ </a> </span>
                        <span class="footer-rss-link"> <a href="http://www.iydu.net/feed" target="_blank" class="rss"> <span class="tinicon-rss"><i class="fa fa-rss"></i></span> <br />RSS </a> </span>
                    </div>
                    <!-- /.links -->
                    <div class="clear clr"></div>
                </div>
            </div>
        </footer>
        <script type="text/javascript">
            $('.site_loading').animate({'width':'90%'},50);  //第四个节点
        </script>
    </section>
</div>
<div id="sign" class="sign">
    <div class="part loginPart">
        <form id="login" novalidate="novalidate">
            <h3>登录<p class="status"></p></h3>
            <p> <label class="icon" for="username"><i class="fa fa-user"></i></label> <input class="input-control" id="username" type="text" placeholder="请输入用户名" name="username" required="" aria-required="true" /> </p>
            <p> <label class="icon" for="password"><i class="fa fa-lock"></i></label> <input class="input-control" id="password" type="password" placeholder="请输入密码" name="password" required="" aria-required="true" /> </p>
            <p class="safe"> <label class="remembermetext" for="rememberme"><input name="rememberme" type="checkbox" checked="checked" id="rememberme" class="rememberme" value="forever" />记住我的登录</label> <a class="lost" href="http://www.iydu.net/wp-login.php?action=lostpassword">忘记密码 ?</a> </p>
            <p> <input class="submit" id="login-user" type="submit" value="登录" name="submit" /> </p>
            <a class="close"><i class="fa fa-times"></i></a>
            <input type="hidden" id="security" name="security" value="0a0415938b" />
            <input type="hidden" name="_wp_http_referer" value="/" />
        </form>
    </div>
    <div class="part registerPart">
        <form id="register"  novalidate="novalidate">

            <h3>注册<p class="status"></p></h3>
            <p> <label class="icon" for="user_name"><i class="fa fa-user"></i></label> <input class="input-control" id="user_name" type="text" name="user_name" placeholder="用户名" required="" aria-required="true" /> </p>
            <p> <label class="icon" for="user_email"><i class="fa fa-envelope"></i></label> <input class="input-control" id="user_phone"  name="user_phone" placeholder="输入常用电话" required="" aria-required="true" /> </p>
            <p> <label class="icon" for="user_pass"><i class="fa fa-lock"></i></label> <input class="input-control" id="user_pass" type="password" name="user_pass" placeholder="密码最小长度为6" required="" aria-required="true" /> </p>
            <p> <label class="icon" for="user_pass2"><i class="fa fa-retweet"></i></label> <input class="input-control" type="password" id="user_pass2" name="user_pass2" placeholder="再次输入密码" required="" aria-required="true" /> </p>
            <p> <input class="submit" id="dosubmit" type="submit" value="注册" name="submit" /> </p>
            <a class="close"><i class="fa fa-times"></i></a>
            <input type="hidden" id="user_security" name="user_security" value="a2adda87ef" />
            <input type="hidden" name="_wp_http_referer" value="/" />
        </form>
    </div>
</div>
<script type="text/javascript" src="/home/lib/layui/layui.js" charset="utf-8"></script>
<script>
    $('#dosubmit').click( function() {
        var user_name = $('#user_name').val();
        var user_phone = $('#user_phone').val();
        var user_pwd = $('#user_pass2').val();
        $.post('/home/doregister',
            {'user_name':user_name, 'user_phone':user_phone, 'user_pwd':user_pwd} ,
            function (data) {
                console.log(data.status);
                if(data.status == 100){

                    layer.alert(data.message, {icon:5 , time:5000})
                }else if(data.status == 200){

                    layer.alert(data.message, {icon:5 , time:5000})
                }else if(data.status == 300){

                    layer.alert(data.message, {icon:6 , time:5000},function(){
                        parent.location.reload(true)
                    })
                }else if(data.status == 400){

                    layer.alert(data.message, {icon:5 , time:5000})
                }
            })

    })
    $('#login-user').click(function(){
        var user_name = $('#username').val();
        var user_pwd = $('#password').val();
        $.post('/home/login',{'user_name':user_name, 'user_pwd':user_pwd}, function(data){
            console.log(data);
            if(data.status == 200){
                layer.alert(data.message, {icon:6, time:3000},function () {
                    parent.location.reload(true);
                })
            }else if(data.status == 100){
                layer.alert(data.message, {icon:5, time:3000});
            }else if(data.status == 300){
                layer.alert(data.message, {icon:5, time:3000});
            }else{
                layer.alert(data.message, {icon:5, time:3000});
            }
        })
    })


</script>
{{--右侧 浮窗--}}
<div class="floatbtn">

    <span id="back-to-top"><i class="fa fa-arrow-up"></i></span>

</div>
<!-- /.Footer Nav Wrap -->
<script type="text/javascript" src="/home/js/zh-cn-tw.js"></script>
<script type="text/javascript" src="/home/js/comments-ajax.js"></script>
<script type="text/javascript" src="/home/js/ajax-sign-script.min.js"></script>
<script type="text/javascript" src="/home/js/prettify.js"></script>
<script type="text/javascript">
    /* <![CDATA[ */
    var ajax_sign_object = {"redirecturl":"http:\/\/www.iydu.net\/liuyan","ajaxurl":"http:\/\/www.iydu.net\/wp-admin\/admin-ajax.php","loadingmessage":"\u6b63\u5728\u8bf7\u6c42\u4e2d\uff0c\u8bf7\u7a0d\u7b49..."};
    /* ]]> */
</script>
<script src="/home/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript">var defaultEncoding = 0; var translateDelay = 100; var cookieDomain = "http://www.iydu.net";</script>

<!-- 引入主题js -->
<script type="text/javascript" src="/home/js/form.js?ver=3.1.5"></script>

<script type="text/javascript" src="/home/js/theme.js?ver=4.3.6"></script>
<!-- /.Footer -->
<script type="text/javascript">
    $('.site_loading').animate({'width':'100%'},50);  //第五个节点
</script>
</body>
</html>
