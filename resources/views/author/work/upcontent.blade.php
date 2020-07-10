<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新建章节</title>
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



    </style>
</head>
<body style="text-align: center;background-color: #F5F5F5">
<div class="x-nav">

    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>


<div style="background-color: white;width: 1000px;height:auto!important;_height:500px;min-height:500px;margin-left: 30px">
    <div class="div1" style="border-bottom:2px solid #E0E0E0" >
        <input id="title" name="title" style="border:0px;width: 950px;height: 49px;outline:none;font-size: 35px" type="text" value="{{$chapter->c_chapter_title}}"><br/>
        <span id="stitle"></span>
    </div>
    <div>
        <input id="chapter_id" type="hidden"  value="{{$chapter->con_id}}">
    </div>
    <div>
        <br/>
        <textarea id="content" name="content" style="border:0px;width: 950px;height: 500px;outline:none;font-size: 25px" >
            {{$chapter->c_content}}
        </textarea>
        <span id="scontent"></span>
    </div>
</div>
<div>
    {{--        收费价格--}}
    <input style="width: 300px;height: 30px" type="text"  name="money" id="money" placeholder="请输入小说章节价格，不输入则不收费">
    <button type="button" id="button" value="保存">保存</button>
</div>
</body>
<script type="text/javascript">
    $('#button').click(function () {
        var article_title = $('#title').val();
        var article_content = $('#content').val();
        var con_id = $('#chapter_id').val();
        var article_money = $('#money').val();
        if(article_title == ''){
            layer.confirm('小说章节号与章节名称不得为空,请确认后提交')
            return false;
        }
        if(article_content == ''){
            layer.confirm('小说内容得为空,请确认后提交')
            return false;
        }
        layer.confirm('请仔细检查您所要提交的文章后提交',function (index) {
            $.post('/author/saveupcontent',
                {'article_title':article_title,'article_content':article_content,'con_id':con_id, 'article_money':article_money},
                function (data) {
                    console.log(data);
                    if(data.status == 200){
                        layer.msg(data.message, {icon:6, time:3000},function () {
                            parent.location.reload(true);
                        })
                    }else{
                        layer.msg(data.message,{icon: 5, time:3000});
                    }
                })
        })
    })
</script>
</html>

