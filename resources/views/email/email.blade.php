<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
    <title>发送邮件</title>
</head>
<body style="text-align: center">

<div style="width: 600px;height: 500px; background-color: floralwhite;margin-left: 300px;margin-top: 50px">


    <div>

        <input type="text"  id="email" placeholder="请输入用户邮箱">
    </div>
    <div>
        <input type="text" placeholder="请输入邮箱验证码" id="content">
    </div>
    <div>
        <button type="button" id="button">验证</button>
    </div>


</div>

</body>
<script type="text/javascript">
    $('#button').click(function(){
        var user_email = $('#email').val();
        var content = $('#content').val();
        var title = $('#title').val();
        if(user_email == ''){
            layer.msg('邮箱不能为空');
            return false;
        }
        if(content == ''){
            layer.mag('发送内容不能为空');
        }
        if(title == ''){
            layer.mag('发送内容不能为空');
        }
        $.post('/ceshi/ceshi',{'user_email':user_email,'content':content,'title':title},function(data){
            if($data.status == 200){
                layer.msg(data.message,{icon:6,time:2000},function(){
                    parent.location.reload(true);
                })
            }else{
                layer.msg(data.message,{icon: 5, time: 2000});
            }
        })

    })


</script>

</html>
