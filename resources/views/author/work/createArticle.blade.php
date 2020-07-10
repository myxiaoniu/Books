<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新建小说</title>
    <link rel="stylesheet" href="/author/css/font.css">
    <link rel="stylesheet" href="/author/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/author/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/author/js/xadmin.js"></script>
    <style>

        input::-webkit-input-placeholder { /* WebKit browsers 适配谷歌 */
            color: #BFBFBF;
        }
        input:-moz-placeholder { /* Mozilla Firefox 4 to 18 适配火狐 */
            color: #BFBFBF;
        }
        input::-moz-placeholder { /* Mozilla Firefox 19+ 适配火狐 */
            color: #BFBFBF;
        }
        input:-ms-input-placeholder { /* Internet Explorer 10+  适配ie*/
            color: #BFBFBF;
        }
        #content::-webkit-input-placeholder{color:#BFBFBF;}
    </style>
</head>
<body style="text-align: center;background-color: lightgoldenrodyellow">
    <div class="x-nav">

        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div style="margin-left: 150px;float: left">
        <select id="select" name="class">
            <option value="">请选择小说分类</option>
            @foreach($articleClass as $class)
                @if($class->class_superior == 0)
                    <optgroup label="{{$class->class_name}}">
                        @foreach($articleClass as $val)
                            @if($val->class_superior == $class->class_id)
                                <option value="{{$val->class_id}}">{{$val->class_name}}</option>
                            @endif
                        @endforeach
                    </optgroup>
                @endif
            @endforeach
        </select>
    </div>

    <div style="background-color: white;width: 1000px;height:auto!important;_height:500px;min-height:500px;margin-left: 150px">
        <div class="div1" style="border-bottom:2px solid #E0E0E0" >

            <input id="title" name="title" style="border:0px;width: 950px;height: 49px;outline:none;font-size: 35px" type="text" placeholder="请输入文章名，实例：“ 斗破苍穹”"><br/>
            <span id="stitle"></span>
        </div>

        <div>
            <br/>
            <textarea id="content" name="content" style="border:0px;width: 950px;height: 500px;outline:none;font-size: 25px" type="text" placeholder="文章简介,实例“ 这是一本好书，历经九九八十一天构思，值得一看”"></textarea>
            <span id="scontent"></span>
        </div>
    </div>
    <div >
        <button  type="button" id="button" value="保存">保存</button>
    </div>
</body>
<script type="text/javascript">
    $('#button').click(function (){
        var article_class = $('#select').val();
        var article_title = $('#title').val();
        var article_content = $('#content').val();
        if(article_class == ''){
            layer.confirm('请选择小说的分类');
            return false;
        }
        if(article_title == ''){
            layer.confirm('请写入文章的 “名称” ');
            return false;
        }
        if(article_content == ''){
            layer.confirm('请写入文章的 “简介” ');
            return false;
        }
        layer.confirm('请确认后提交',function(index){
            $.post('/author/saveArticle',
                {'article_class':article_class,'article_title':article_title,'article_content':article_content},
                 function(data){
                console.log(data);
                if(data.status == 200){
                    layer.msg(data.message, {icon:6, time:3000},function () {
                            parent.location.reload(true);
                    })
                }else if(data.status == 201){
                    layer.msg(data.message, {icon: 5, time: 3000});
                }else{
                    layer.msg(data.message, {icon: 5, time: 3000});
                }
             })
        })

    })
</script>
</html>
