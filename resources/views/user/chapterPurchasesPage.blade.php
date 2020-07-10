<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>购买章节页面</title>
    <link rel="stylesheet" href="/author/css/font.css">
    <link rel="stylesheet" href="/author/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/author/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/author/js/xadmin.js"></script>
    <style type="text/css">
        body{
            background: url({{'/image/xuanchuan.jpg'}});
        }
        .biaoqian1{
            background-color: orangered;
            border: blue solid 1px;
            width: 120px;
            height: 120px;
            margin-left: 20px;
            float: left;
            margin-top: 30px;
        }
        #div1{
            width: 600px;
            height: 500px;
            background-color: papayawhip;
            margin-top: 60px;
            margin-left: 400px;

        }
        a{
            margin-top: 530px;
        }

    </style>
</head>
<body >

    <div id="div1" >
        <div  style="margin-left: 150px">
            <br/>
            <h3 style="margin-top: 20px">{{$article->article_title}}</h3>
            <h3 style="margin-top: 20px">从：{{$chapter->c_chapter_title}} 开始购买</h3>

        </div>
        <hr/>
                <input type="hidden" id="chapter_id" value="{{$chapter->con_id}}">
                <input type="hidden" id="article_id" value="{{$article->article_id}}">
                <label class="layui-form-label">自定义章数</label>
                <input style="height: 40px" type="text" id="chapterNums" placeholder="请输入文章数"> &nbsp;&nbsp;&nbsp;
                <input type="hidden" id="allowBuy" value="{{$allowBuy}}">
                <span >允许购买的最大章节数为：{{$allowBuy}}   </span>

            <button id="button" class="layui-btn layui-btn-radius" type="button">购买</button>
        <br>

        <label id="count" class="layui-form-label"></label>

    </div>
</body>
<script type="text/javascript">


    $('#button').click(function(){
        var chapter_id = $('#chapter_id').val();
        var article_id = $('#article_id').val();
        var chapterNums = $('#chapterNums').val();
        var allowBuy = $('#allowBuy').val();
        console.log(allowBuy);
        if(!(chapterNums.match('^[-\\\\+]?([0-9]+\\\\.?)?[0-9]+$'))){
            layer.msg('亲，请输入数字');
            return false;
        }else{
            var count = chapterNums/10;
            $('#count').html('共计： '+ count + '元');
        }
        // if(allowBuy < 2){
        //     layer.msg('土豪，有的章节您已经购买过了，请重新输入');
        //     return false;
        // }
       $.post('/user/chapterPurchases',
           {'chapterNums':chapterNums,'article_id':article_id,'chapter_id':chapter_id,'allowBuy':allowBuy},
           function(data){
           if(data.status == 200){
               layer.msg(data.message,{icon:6, time:2000},function(){
                   parent.location.reload(true);
               })
           }else if(data.status == 201){
               layer.msg(data.message, {icon:5,time:2000});
           }else if(data.status == 202){
               layer.msg(data.message, {icon:5,time:2000});
           }else if(data.status == 500){
               layer.msg(data.message, {icon:5,time:2000});
           }
       })

    })
</script>
</html>
