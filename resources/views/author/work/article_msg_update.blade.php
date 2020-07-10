<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>作品信息修改页面</title>
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
<body style="background-color: #F5F5F5">


   <div>
       {{--小说封面--}}
       <div style="margin-left: 30px;float: left;margin-top: 15px">
           <img style="width: 370px;height: 200px" src="{{$article->article_portrait}}" alt="">

       </div>
       <div style="width: 600px;height:auto!important;_height:300px;min-height:300px;border: black solid 2px;float:right;margin-right: 30px;margin-top: 15px">
           <div class="div1" style="border-bottom:2px solid #E0E0E0" >
               <input id="title" name="title" style="border:0px;width: 600px;height: 49px;outline:none;font-size: 35px" value="{{$article->article_title}}" type="text" ><br/>
               <span id="stitle"></span>
           </div>
           <div>
               <input id="article_id" type="hidden"  value="{{$article->article_id}}">
           </div>
           <div>
               <br/>
               <textarea id="content" name="content" style="border:0px;width: 600px;height: 300px;outline:none;font-size: 25px" type="text" >{{$article->article_content}}</textarea>
               <input type="submit" id="submit" value="保存">
               <span id="scontent"></span>
           </div>
       </div>
       <div style="width: 300px">
           <br /><br /><br /><br />
           <form action="{{url('author/uploadimg')}}" method="POST" enctype="multipart/form-data">
               <input type="file" id="tupain" name="tupian" placeholder="请选择您想要的封面">
               <input type="hidden" name="article_id" value="{{$article->article_id}}">
               <input type="submit" name="submit" id="button" value="保存">
           </form>

       </div>
   </div>
</body>
<script type="text/javascript">
    // $('#button').click(function(){
    //     var  tupian = $('#tupain').val();
    //     layer.confirm('确认上传这张图片作为你的小说封面吗？',function(index){
    //         $.post('/author/uploadimg',{'tupian':tupian},function(data){
    //             console.log(data);
    //         })
    //     })
    // })
    $('#submit').click(function () {
        var article_id = $('#article_id').val();
        var article_title = $('#title').val();
        var article_content = $('#content').val();
        if(article_title == ''){
            layer.confirm('小说名，不能为空');
            return false;
        }
        if(article_content == ''){
            layer.confirm('您不打算介绍一下您的著作吗？');
            return false;
        }
        layer.confirm('请检查您所要提交的内容后提交',function (index) {
            $.post('/author/nameupdate',
                {'article_id':article_id,'article_title':article_title,'article_content':article_content},
                 function (data){
                    console.log(data);
                    if(data.status == 200){
                        layer.msg(data.message, {icon:6, time:3000},function () {
                            parent.location.reload(true);
                        })
                    }else if(data.status == 300){
                        layer.msg(data.message, {icon: 5, time: 3000});
                    }else{
                        layer.msg(data.message, {icon: 5, time: 3000});
                    }
                 })
        })
    })
</script>
</html>
