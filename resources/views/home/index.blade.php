<!DOCTYPE html>
<html lang="zh-CN">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <!-- 引入页面描述和关键字模板 -->
  <title>全书网</title>
  <meta name="description" content="云悦读专注于提供多元化的阅读体验，以阅读提升生活品质" />
  <meta name="keywords" content="云悦读,悦读,阅读,文字,历史,杂谈,散文,见闻,游记,人文,科技,杂碎,冷笑话,段子,语录" />
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
  <!-- 引入主题样式表 -->
  <link rel="stylesheet" type="text/css" href="/home/css/style.css" />
  <!-- 引入主题响应式样式表-->
  <link rel="stylesheet" type="text/css" href="/home/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="/home/css/custom.css" />
    <link rel="stylesheet" type="text/css" href="/home/css/custom.css" />
  <!-- 引入字体样式表-->
  <link rel="stylesheet" type="text/css" href="/home/css/font-awesome.css" media="all" />
{{--    轮播样式--}}

     <script type="text/javascript" src="/author/lib/layui/layui.js" charset="utf-8"></script>
     <link rel="stylesheet" type="text/css" href="/author/lib/layui/css/layer.css" media="all" />
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
 </head>
 <body id="wrap" class="home blog">
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
        <ul id="menu-mobile" class="menu-mobile">
            <li id="menu-item-4324" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-4324"><a href="">首页</a></li>

        </ul>
{{--        下路框--}}

    </div>
   </aside>
   <!-- /.Moblie nav -->
   <section id="content-container" style="background:#f1f4f9; ">
    <header class="header-wrap" id="nav-scroll">
     <div class="nav-wrap">
      <div class="logo-title">
       <a href="" alt="全书网" title="全书网"> 全书网 </a>
      </div>
      <!-- Toggle menu -->
      <div class="toggle-menu">
       <i class="fa fa-bars"></i>
      </div>
      <div class="search-btn-click">
             <i class="fa fa-search"></i>
             <div class="header-search-slide">
                 <form method="get" id="searchform-slide" class="searchform" action="" role="search">
                     <input type="search" class="field" name="s" value="" placeholder="Search" required="" />
                 </form>
             </div>
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

      <!-- /.Login status -->
      <!-- Focus us -->

      <!-- /.Focus us -->
      <!-- Menu Items Begin -->
{{--         小说分类--}}
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
    <!-- Main Wrap -->
    <div id="main-wrap">
     <div id="sitenews-wrap" class="container"></div>
     <!-- Header Banner -->
     <!-- /.Header Banner -->
     <!-- CMS Layout -->
     <div class="container two-col-container cms-with-sidebar">
      <div id="main-wrap-left">
       <!-- Stickys -->
       <!-- /.Stickys -->
{{--          主题--}}
{{--        @if(empty($class))--}}
              <section class="catlist-154 catlist clr">
                  <div class="catlist-container clr" >
                      <h2 class="home-heading clr"> <span class="heading-text"> 全书网 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 迄今为止&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        中国最大的一家小说网站</span>
                          <a href="">+ 更多</a>
                      </h2>
                      <span class="col-left catlist-style2">
          <article class="home-blog-entry clr">
             <a href="{{url('home/index')}}" title="全书网，用心创作小说" class="fancyimg home-blog-entry-thumb">
                 <div class="thumb-img">
                     <img src="/image/wangzhan/quan.jpg" alt="全书网，用心创作小说" />
                     <span><i class="fa fa-pencil"></i></span>
                 </div>
             </a>
            <h3><a href="{{url('home/index')}}" title="全书网，用心创作小说">写小说，哪家强，请来百度找 <font style="color: #23BD2B">全书</font></a></h3>
             <div class="postlist-meta">
            <span class="postlist-meta-time" style="color: blue">{{$time}}</span>
            <span class="delim"></span>
             </div>
             <p> 风无颜，云似羽，风卷云舒，是风在追逐云，还是云偶遇了风，我们在此相聚，只是为小说欢颜，为小说落羽！ </p>
             </article> </span>
                      {{--            轮播部分--}}
            <span class="col-right catlist-style2" style="width: 400px">
                <div class="layui-carousel" id="test1">
                        <div carousel-item>
                            @foreach($number as $v)
                                <div>
                                    <img src="/public/image/wangzhan/lunbo/.{{$v}}.jpg" alt="">
                                </div>
                            @endforeach

                        </div>
                </div>
            </span>
          </div>
      </section>
{{--        @endif--}}

       <div id="loopad" class="container">
       </div>
          <script type="text/javascript">
              layui.use('carousel', function(){
                  var carousel = layui.carousel;
                  //建造实例
                  carousel.render({
                      elem: '#test1'
                      ,width: '100%' //设置容器宽度
                      ,arrow: 'always' //始终显示箭头
                      //,anim: 'updown' //切换动画方式
                  });
              });
          </script>



      <!-- pagination -->
       <div class="clear">
       </div>
       <div class="pagination">
       </div>
       <!-- /.pagination -->
      </div>
      <script type="text/javascript">
	$('.site_loading').animate({'width':'55%'},50);  //第二个节点
</script>
      <div id="sidebar" class="clr">

       <div id="search-3" class="widget widget_search">
        <h3><span class="widget-title">站内搜索</span></h3>
        <form method="get" class="searchform themeform" action="http://www.iydu.net/">
         <div>
          <input type="text" class="search" name="s" onblur="if(this.value=='')this.value='Search..';" onfocus="if(this.value=='Search..')this.value='';" value="Search.." maxlength="20" required="required" />
         </div>
        </form>
       </div>

       <div id="text-12" class="widget widget_text">
        <div class="textwidget">
         <script type="text/javascript">
    (function(win,doc){
        var s = doc.createElement("script"), h = doc.getElementsByTagName("head")[0];
        if (!win.alimamatk_show) {
            s.charset = "utf-8";
            s.async = true;
            s.src = "http://a.alimama.cn/tkapi.js";
            h.insertBefore(s, h.firstChild);
        };
        var o = {
            pid: "mm_31202157_7418138_30178413",/*推广单元ID，用于区分不同的推广渠道*/
            appkey: "",/*通过TOP平台申请的appkey，设置后引导成交会关联appkey*/
            unid: "",/*自定义统计字段*/
            type: "click" /* click 组件的入口标志 （使用click组建必设）*/
        };
        win.alimamatk_onload = win.alimamatk_onload || [];
        win.alimamatk_onload.push(o);
    })(window,document);
</script>
         <p align="center"><a data-type="3" data-tmpl="320x250" data-tmplid="187" data-rd="2" data-style="2" data-border="1" href="#"></a></p>
        </div>
       </div>

       <div class="floatwidget-container">
       </div>
      </div>
      <script type="text/javascript">
	$('.site_loading').animate({'width':'78%'},50);  //第三个节点
</script>
     </div>
     <div class="clear">
     </div>
     <!-- Blocks Layout -->
    </div>
    <!--/.Main Wrap -->
    <!-- Bottom Banner -->
    <div style="height:20px;"></div>
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
        <!--80 queries in 3.588 seconds.-->
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
  <!-- 百度分享 -->
  <script type="text/javascript" id="bdshare_js" data="type=tools&amp;mini=2"></script>
  <script type="text/javascript" id="bdshell_js"></script>
  <script type="text/javascript">
		//在这里定义bds_config
		var bds_config = {'snsKey':{'tsina':"2884429244",'tqq':"101166664"}};
		document.getElementById('bdshell_js').src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
</script>
  <!-- 引入用户自定义代码 -->
  <!-- 引入主题js -->

  <script type="text/javascript" src="/home/js/theme.js?ver=4.3.6"></script>
  <!-- /.Footer -->
  <script type="text/javascript">
	$('.site_loading').animate({'width':'100%'},50);  //第五个节点
</script>
 </body>
</html>
