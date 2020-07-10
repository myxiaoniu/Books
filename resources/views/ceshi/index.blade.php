<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>发送电信验证码</title>
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/home/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/home/js/xadmin.js"></script>
</head>
<body >
<form>
    <div style="align-content: center" >
        <div>
            <span>手机号码:</span>
            <input type="text" placeholder="手机号码" name="telephone"><br/><br/>
        </div>
        <div>
            <span>验证码:</span>
            <input type="text" placeholder="请输入短信验证码" name="phonecode"><br/>
            <input id="submit" type="submit" value="获取验证码">
        </div>



    </div>
</form>
</body>
<script type="text/javascript">
    $('#submit').click(function(){
        var phone = $("input[name='telephone']").val();

        $.post('/ceshi/docode',
            {'phone':phone},
            function(data){
            console.log(data);
            // if(data.status == 200){
            //     layer.alert(data.message,{icon:6, time:3000},function(){
            //         parent.location.reload(true);
            //     })
            // }else{
            //     layer.alert(data.message,{icon:5, time:3000});
            // }
        })


    })




</script>
</html>
