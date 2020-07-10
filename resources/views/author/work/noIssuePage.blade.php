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
</head>

<body>
<div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
      </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">

    {{--    <xblock>--}}
    {{--        <button class="layui-btn" onclick="x_admin_show('添加权限','{{url('admin/permission/create')}}')"><i class="layui-icon"></i>添加</button>--}}

    {{--    </xblock>--}}
    {{--    @foreach($user as $val)--}}
    @if(empty($article[0]))
        <div>
            <span style="font-size: 20px">亲爱的 ：</span>
            <span style="font-size: 35px;color: red">{{$author->author_name}} &nbsp;&nbsp;&nbsp;</span>
            <span style="font-size: 20px">大神</span><br/><br/>
            <span style="font-size: 20px">您的文章目前都已经上传成功了。请再接再厉</span>

        </div>
    @else
        <span style="font-size: 20px">您一共写作了</span>

        <table class="layui-table">
            <thead>
            <tr>
                <th>小说封面</th>
                <th>名称</th>
                <th>创建时间</th>
                <th>操作</th>
            </thead>
            <tbody>
            @if(!(empty($article)))
                @foreach($article as $val)

                    <tr>
                        <td><img src="{{$val->article_portrait}}" alt=""></td>
                        <td>{{$val->article_title}}</td>
                        <td>{{$val->article_create}}</td>
                        <td class="td-manage">
                            <a title="作品发布"  onclick="fabu(this,{{$val->article_id}})" href="javascript:;">
                                <i class="layui-icon">&#xe65c;</i>
                            </a>
                            <a title="作品信息修改" onclick="x_admin_show('作品信息修改','{{url('author/msgupdate/'.$val->article_id)}}')"
                               href="javascript:;">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a title="作品管理" onclick="x_admin_show('作品管理','{{url('author/articleuppage/'.$val->article_id)}}')"
                               href="javascript:;">
                                <i class="layui-icon">&#xe620;</i>
                            </a>
                        </td>
                        <td>
                            <a  href="{{url('author/writingPage/'.$val->article_id)}}">
                                继续写作
                            </a>
                        </td>
                    </tr>

                @endforeach
            @else
                <div>
                    <span>尊敬的：</span>
                    <span>{{$author->author_name}}</span>
                    <span>您还没有发布小说</span>
                </div>
            @endif

            </tbody>
        </table>
    @endif



</div>
<script>
    /*小说-发布*/
    function fabu(obj ,id) {
        layer.confirm('尊敬的作者大人，您确定要把这本小说发布吗？',function(){
            $.post('/author/put/' + id ,function (data){
                if(data.status == 200){
                    layer.msg(data.message, {icon:6, time:3000},function () {
                        parent.location.reload(true)
                    })

                }else if(data.status == 201){
                    layer.msg(data.message, {icon: 5, time: 3000});
                }else{
                    layer.msg(data.message, {icon: 5, time: 3000});
                }
            })
        })
    }

    /*小说-完结*/

    /*小说-信息修改*/


</script>

</body>

</html>
