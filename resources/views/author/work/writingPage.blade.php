<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>update</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/author/css/font.css">
    <link rel="stylesheet" href="/author/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/author/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/author/js/xadmin.js"></script>

</head>
<body>
<!-- 顶部开始 -->
<div class="container">
    <div class="logo"><a href="">{{$article->article_title}}</a></div>
    <div class="left_open">
        <i title="展开左侧栏" class="iconfont">&#xe699;</i>
    </div>

</div>
<!-- 顶部结束 -->
<!-- 中部开始 -->
<!-- 左侧菜单开始 -->
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <li>
                <a _href="{{url('author/content/'.$article->article_id)}}">

                    <cite>新建章节</cite>
                </a>
            </li>
                @if(empty($catalog[0]))
                    <span>{{$article->article_title}}:<br/><br/>暂无内容</span>
                @else
                <li>
                    <a href="javascript:;">
                        <cite>章节目录</cite>
                    </a>
                    @foreach($catalog as $val)
                        <ul class="sub-menu">
                            <li>
                                <a _href="{{url('author/chapter/'.$val->con_id)}}">
                                    <cite> {{$val->c_chapter_title}}</cite>
                                </a>
                            </li >
                        </ul>
                    @endforeach

                @endif

            </li>
        </ul>
    </div>
</div>
<!-- <div class="x-slide_left"></div> -->
<!-- 左侧菜单结束 -->
<!-- 右侧主体开始 -->
<div class="page-content">
    <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
        <ul class="layui-tab-title">
            <li>新建文章</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src='{{url('author/content/'.$article->article_id)}}' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="page-content-bg"></div>

<script>

</script>
</body>
</html>

