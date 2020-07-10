<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>角色页面</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/authorcss/font.css">
    <link rel="stylesheet" href="/author/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/author/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/author/js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        /*.ytkah{ width:300px; height:74px; float:left;}*/
        /*.ytkah ul{ width:280px;}*/
        /*.ytkah li{ width:100px; float:left; display:block;}*/
        .list{width:800px;overflow:hidden;zoom:1;border:1px solid blue}
        .list li{float:left;width:190px;padding:5px}
    </style>
</head>

<body>
<div class="x-nav">

    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
    <div>
        <span class="layui-btn layui-btn-lg layui-btn-radius layui-btn-normal" style="font-size: 20px">{{$article->article_title}}</span>
        <input style="margin-left: 160px" type="submit" id="submit" 	class="layui-btn layui-btn-radius layui-btn-danger" value="删除">
    </div>
    <br/><br/><br/>
    @if(empty($lastContent))
        <span>这本小说 暂时还没有 内容</span>
    @else
        <div class="list" style="margin-left: 150px">
            <span>只可以删除最后一章， 前面的只能是修改</span><br/><br/>
            <span>{{$lastContent->c_chapter_title}}</span><br/><br/>
            <input type="hidden"  id="con_id" value="{{$lastContent->con_id}}">
            <button type="button" id="button">删除</button>
        </div>
    @endif




</div>
<script>
    /*小说-删除*/
    /* 整本删除  就不写了*/
    $('#submit').click(function(){
        layer.confirm('您确定要删除您的这本小说吗？',function(index){
            layer.msg('删除失败',{icon:5, time:1000});
        })
    })

    /*小说-章节删除*/
    $('#button').click(function(){
        var con_id = $('#con_id').val();
        layer.confirm('您确定要删除本章节吗？',function(index){
            $.post('/author/delarticle',{'con_id':con_id},function(data){
                if(data.status == 200){
                    layer.msg(data.message, {icon:6, time:2000},function () {
                        parent.location.reload(true);
                    })
                }else{
                    layer.msg(data.message, {icon:5,time:2000});
                }
            })
        })


    })



</script>

</body>

</html>
