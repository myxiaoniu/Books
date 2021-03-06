<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="baidu-site-verification" content="fu3PTj4mmu" />
    <!-- 引入页面描述和关键字模板 -->
    <title>全书网</title>


    <!-- 禁止浏览器初始缩放 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <!-- 引入主题样式表 -->
    <link rel="stylesheet" type="text/css" href="/home/css/style.css" />
    <!-- 引入主题响应式样式表-->
    <link rel="stylesheet" type="text/css" href="/home/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="/home/css/custom.css" />
    <link rel="stylesheet" type="text/css" href="/author/lib/layui/css/layui.css" />


    <!-- 引入字体样式表-->
    <link rel="stylesheet" type="text/css" href="/home/css/font-awesome.css" media="all" />

    <script type="text/javascript" src="/author/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/author/js/xadmin.js"></script>
    <!-- 引入用户自定义代码 -->
    <script type="text/javascript">
        window._wpemojiSettings = {"baseUrl":"http:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"http:\/\/www.iydu.net\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.3.6"}};
        !function(a,b,c){function d(a){var c=b.createElement("canvas"),d=c.getContext&&c.getContext("2d");return d&&d.fillText?(d.textBaseline="top",d.font="600 32px Arial","flag"===a?(d.fillText(String.fromCharCode(55356,56812,55356,56807),0,0),c.toDataURL().length>3e3):(d.fillText(String.fromCharCode(55357,56835),0,0),0!==d.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
    </script>
    <style type="text/css">

    </style>
    <script type="text/javascript" src="/home/js/jquery.min.js?ver=4.3.6"></script>

    <script type="text/javascript" src="/home/js/lazyload.js"></script>
    <!-- IE Fix for HTML5 Tags -->
    <!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <script src="js/css3-mediaqueries.js"></script>
    <script src="js/PIE_IE678.js"></script>
    <link rel="stylesheet" type="text/css" href="/home/css/iefix.css"  media="all" />
    <![endif]-->
    <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="/home/css/font-awesome-ie7.min.css"  media="all" />
    <![endif]-->
    <!--[if IE 6]>
    <script src="/home/js/kill-IE6.js"></script>
    <![endif]-->
    <style>
        a { color:greenyellow; transition:0.5s; }
        a:hover { color:pink; }
    </style>
</head>
<body id="wrap" class="single single-post postid-5136 single-format-aside">
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
                <!-- /.Toggle menu -->
                <!-- Search button -->

                <!-- /.Search button -->
                <!-- Login status -->
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
            <!-- /.Login status -->
                <!-- Focus us -->

                <!-- /.Focus us -->
                <!-- 小说分类 -->
                <nav id="primary-navigation" class="site-navigation primary-navigation " role="navigation">
                    <div class="menu-%e9%a1%b6%e9%83%a8%e8%8f%9c%e5%8d%95-container">
                        <ul id="menu-%e9%a1%b6%e9%83%a8%e8%8f%9c%e5%8d%95" class="nav-menu">
                            <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-4324"><a href="{{url('home/index')}}">首页</a></li>
                            @foreach($articleClass as $class)
                                @if($class->class_superior == 0)
                                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children "><a href="">{{$class->class_name}}</a>
                                        <ul class="sub-menu">
                                            @foreach($articleClass as $v)
                                                @if($v->class_superior == $class->class_id)
                                                    <li><a href="{{url('home/class/'. $v->class_id)}}">{{$v->class_name}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-4324"><a href="{{url('author/index')}}">作家专区</a></li>

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
        <div class="breadcrumbs">
            <div class="container clr">
                <div class="header-search">
                    {{--                    搜索框--}}
                    <input type="text" id="userSearch" name="search" placeholder="请输入搜索内容">
                    <button type="button" id="button">搜索</button>
                </div>
                <div id="breadcrumbs">
                    <h1> <i class="fa fa-pen"></i> 全书网， 让你的生活爱上阅读</h1>
                    <div class="breadcrumbs-text">


                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#button').click(function(){
                var search = $('#userSearch').val();
                if(search == ''){
                    layer.confirm('请输入需要搜索的内容')
                    return false;
                }
                $.post('/index/search',{'search':search},function(data){

                })
            })
        </script>
        <!-- Header Banner -->
        <!-- /.Header Banner -->
        <!-- 主题 -->
        <div id="main-wrap" style="margin-left: 200px">
            <div id="sitenews-wrap" class="container"></div>
            <div id="single-blog-wrap" class="container two-col-container">
                <div id="main-wrap-left">
                    <!-- Content -->
                    <div class="content">
                        <!-- Post meta -->
                        <div id="single-meta">
                            {{$classOne->class_name}} >>>>  {{$classTwo->class_name}} >>>> {{$article->article_title}}
                        </div>

                        <div class="single-text" style="margin-top: 20px" >
                            <div style="float: left;">
                                <img src="{{$article->article_portrait}}" >
                            </div>
                            <div style="float: left;margin-top: 40px;margin-left: 30px;line-height:20px;">
                                <h1 style="display: inline;color: goldenrod">{{$article->article_title}}</h1>&nbsp;&nbsp;&nbsp;
                                {{$author->author_name}}&nbsp;&nbsp;&nbsp; 著 <br/><br/>
                                @if($article->article_type == 0)
                                    @if($article->article_money == 0)
                                        <span class="layui-btn layui-btn-radius layui-btn-primary">连载</span>
                                        <span class="layui-btn layui-btn-radius layui-btn-primary">免费</span>
                                        <span class="layui-btn layui-btn-radius layui-btn-primary">{{$classTwo->class_name}}</span><br/><br/>
                                    @else
                                        <span class="layui-btn layui-btn-radius layui-btn-primary">连载</span>
                                        <span class="layui-btn layui-btn-radius layui-btn-primary">VIP</span>
                                        <span class="layui-btn layui-btn-radius layui-btn-primary">{{$classTwo->class_name}}</span><br/><br/>
                                    @endif

                                @else
                                    @if($article->article_money == 0)
                                        <span class="layui-btn layui-btn-radius layui-btn-primary">完结</span>
                                        <span class="layui-btn layui-btn-radius layui-btn-primary">免费</span>
                                        <span class="layui-btn layui-btn-radius layui-btn-primary">{{$classTwo->class_name}}</span><br/><br/>
                                    @else
                                        <span class="layui-btn layui-btn-radius layui-btn-primary">完结</span>
                                        <span class="layui-btn layui-btn-radius layui-btn-primary">VIP</span>
                                        <span class="layui-btn layui-btn-radius layui-btn-primary">{{$classTwo->class_name}}</span><br/><br/>
                                    @endif
                                @endif

                                心潮澎湃，无限幻想，迎风挥击千层浪，少年不败热血！<br/><br/>
                                小说总字数； 小说总推月票<br/><br/>

                                <a href="{{url('home/chapterContent/'.'1')}}" class="layui-btn layui-btn-danger">免费试读</a>
                                <input type="hidden" id="article_id" value="{{$article->article_id}}">
                                @if(!empty($user))
                                    <span  id="addBookrack" class="layui-btn layui-btn-primary">加入书架</span>
                                    <a href="" class="layui-btn layui-btn-primary">打赏月票</a>
                                @endif


                            </div>
{{--           加入书架             --}}
                            <script type="text/javascript">
                                var article_id = $('#article_id').val();
                                $('#addBookrack').click(function(){
                                    $.post('/user/addBookrack',{'article_id':article_id},function(data){
                                        if(data.status == 200){
                                            layer.msg(data.message, {icon:6, time:2000})
                                        }else if(data.status == 201){
                                            layer.msg(data.message, {icon:6, time:2000})
                                        }else{
                                            layer.msg(data.message, {icon:5, time:2000})
                                        }
                                    })
                                })
                            </script>
                        </div>
                        <hr/>
{{--                        小说简介--}}
                        <div >
                            <span style="font-size: 30px">文章简介</span><br/><br/>
                            <p style="text-indent:2em;font-size: 25px">{{$article->article_content}}</p>
                            <hr/>
                        </div>
{{--                        小说目录--}}
                        <div style="line-height:30px;">
                            @if(empty($charge[0]))
                                <span> 作品章节</span>
                                <hr/>
                                @foreach($noMoney as $val)

                                    <ul>
                                        <li style="float: left;margin-left: 60px;width: 22%">
                                            <a style="color:darkturquoise;font-size: 15px" href="{{url('home/chapterContent/'.$val->con_id)}}">
                                                {{$val->c_chapter_title}}
                                            </a>
                                        </li>
                                    </ul>
                                @endforeach
                            @else
                                <span style="color: #23BD2B">免费章节</span><br/><br/>
                                @foreach($noMoney as $val)

                                    <ul>
                                        <li style="float: left;margin-left: 60px;width: 22%">
                                            <a style="color:darkturquoise;font-size: 15px" href="{{url('home/chapterContent/'.$val->con_id)}}">
                                                {{$val->c_chapter_title}}
                                            </a>
                                        </li>
                                    </ul>
                                @endforeach
                                <hr/>
                                <span style="color: red">VIP章节</span>
                                @if(empty($user))
                                    @foreach($charge as $val)
                                        <ul>
                                            <li style="float: left;margin-left: 60px;width: 22%">
                                                <a class="noMoney" style="color:darkturquoise;font-size: 15px">
                                                    {{$val->c_chapter_title}}
                                                </a>
                                            </li>
                                        </ul>
                                    @endforeach
                                @else
                                    @foreach($charge as $val)
                                    <ul>
                                        <li style="float: left;margin-left: 60px;width: 22%">
                                            <a style="color:darkturquoise;font-size: 15px" href="{{url('home/chapterContent/'.$val->con_id)}}">
                                                {{$val->c_chapter_title}}
                                            </a>
                                        </li>
                                    </ul>
                                    @endforeach

                                @endif
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--        付费章节  查看是否登录--}}
        <script type="text/javascript">
            $('.noMoney').click(function(){
                layer.msg('此章节为付费章节， 请先登录',{icon:5,time:2000})
            })
        </script>
        <!--/.Main Wrap -->
        <!-- Bottom Banner -->
        <div style="height:10px;"></div>
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
        <!-- /.Footer Wrap -->
        <!-- Footer Nav Wrap -->
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
                        <!--52 queries in 1.101 seconds.-->
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
{{--  <link rel="stylesheet" href="/home/css/font.css">--}}

{{--  <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>--}}

<script type="text/javascript" src="/home/js/xadmin.js"></script>
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
{{--右侧  功能浮窗--}}
<div class="floatbtn">

    <span class="commentbtn mobile-hide"><a title="小说评论" href="{{url('comment/commentPage/'.$article->article_id)}}"><i class="fa fa-comments"></i></a></span>

    <span id="zh-cn-tw" class="mobile-hide"><i><a id="StranLink">繁</a></i></span>

    <span id="back-to-top"><i class="fa fa-arrow-up"></i></span>

</div>

<!-- /.Footer Nav Wrap -->
<script type="text/javascript" src="/home/js/zh-cn-tw.js"></script>
<script type="text/javascript" src="/home/js/comments-ajax.js"></script>
<script type="text/javascript" src="/home/js/ajax-sign-script.min.js"></script>
<script type="text/javascript" src="/home/js/prettify.js"></script>
<script type="text/javascript">
    /* <![CDATA[ */
    var ajax_sign_object = {"redirecturl":"http:\/\/www.iydu.net\/","ajaxurl":"http:\/\/www.iydu.net\/wp-admin\/admin-ajax.php","loadingmessage":"\u6b63\u5728\u8bf7\u6c42\u4e2d\uff0c\u8bf7\u7a0d\u7b49..."};
    /* ]]> */
</script>
<script src="/home/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript">var defaultEncoding = 0; var translateDelay = 100; var cookieDomain = "http://www.iydu.net";</script>


<script type="text/javascript" src="/home/js/theme.js?ver=4.3.6"></script>
<!-- /.Footer -->
<script type="text/javascript">
    $('.site_loading').animate({'width':'100%'},50);  //第五个节点
</script>
</body>
</html>
