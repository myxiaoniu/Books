<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>短信</title>
    <script type="text/javascript" src="/home/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/home/js/xadmin.js"></script>
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
    <ul>
        <li>
            <span>手机号码:</span>
            <input type="text" placeholder="手机号码" name="telephone">
        </li>
        <li>
            <span>验证码:</span>
            <input type="text" placeholder="短信验证码" name="phonecode">
            <input class="code_btn"  type="submit" id="submit" value="获取验证码">
        </li>
    </ul>
</body>

<script type="text/javascript">

    $('#submit').click(function(){
        var phone = $("input[name='telephone']").val();
        // alert('年后');

        if (!(phone.match(/^1[34578]\d{9}$/))) {
            layer.msg("请正确输入手机号！");
            return false;
        }

        var url = "/ceshi/docode";
        $.post(url,{'phone':phone}, function (resdata) {
            console.log(resdata);
            layer.msg(resdata.data);
            if (resdata.type == 1) {
                $(".code_btn").attr('onclick', "return false;");
                listion_sendmsm();
            }
        })
        return false;
    })



    function listion_sendmsm() {
        var time = 61;
        setTime = setInterval(function () {
            if (time <= 1) {
                clearInterval(setTime);
                $(".code_btn").text("再发一次");
                $(".code_btn").attr('onclick', "return get_svg();");
                return;
            }
            time--;
            $(".code_btn").text(time + "s");

        }, 1000);
    }
</script>
</html>

