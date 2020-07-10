<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>工作台-主页</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="/author/css/font.css">
        <link rel="stylesheet" href="/author/css/xadmin.css">
    </head>
    <body>
        <div class="x-body">
            <blockquote class="layui-elem-quote">大神: {{$author->author_name}}  </blockquote>
            <fieldset class="layui-elem-field">
              <legend>小说统计</legend>
              <div class="layui-field-box">
                <table class="layui-table" lay-even>
                    <thead>
                        <tr>
                            <th>统计</th>
                            <th>写作本数</th>
                            <th>写作字数</th>
                            <th>月票总数</th>
                            <th>关注量</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>总数</td>
                            <td>0</td>
                            <td>9</td>
                            <td>0</td>
                            <td>8</td>
                        </tr>

                    </tbody>
                </table>

              </div>
            </fieldset>
            <blockquote class="layui-elem-quote">作品管理 </blockquote>
        </div>
        <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
          var s = document.getElementsByTagName("script")[0];
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
    </body>
</html>
