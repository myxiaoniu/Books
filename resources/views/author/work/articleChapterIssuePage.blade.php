<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>小说章节发布</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
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
</head>

<body>
<div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">{{$article->article_title}}</a>

      </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">

    <xblock>
        <span class="layui-btn layui-btn-radius layui-btn-normal" >未发布</span>
        <button class="layui-btn layui-btn-radius layui-btn-danger" onclick="addAll()">批量发布</button>

        <span class="x-right" style="line-height:40px">共有数据：{{$noCount}} 条</span>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th>
                <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>章节名</th>
            <th>添加时间</th>

        </thead>
        <tbody>
        @foreach($chapterNo as  $v)
            <tr>
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $v->con_id }}'><i class="layui-icon">&#xe605;</i></div>
                    </td>
                    <td>{{$v->c_chapter_title}}</td>
                    <td>{{$v->c_create}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="page">
        {{$chapterNo->links()}}
    </div>

</div>

<script>
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        //执行一个laydate实例
        laydate.render({
            elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
            elem: '#end' //指定元素
        });
    });

    function addAll() {
        var ids = [];
        $(".layui-form-checked").not('.header').each(function (i,y) {
            var u = $(y).attr('data-id');
            ids.push(u);
            // console.log(ids);
        })
        layer.confirm('赶紧检查一下吧，您的那些小读者已经安耐不住内心的火热了',function(index){
            if(ids == ''){
                layer.msg('您并没有选择发布的小说啊！')
                return false;
            }
            $.post('/author/addIssue',{'ids':ids},function(data){
                if(data.status == 200){
                    layer.msg(data.message, {icon:6, time:2000},function () {
                        parent.location.reload(true);
                    })
                }else{
                    layer.msg(data.message, {icon:5, time:2000});
                }
            })
        })
    }


</script>

</html>
