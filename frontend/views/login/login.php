<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="<?php echo \Yii::$app->request->hostInfo; ?>/layui/css/layui.css"/>
    <!--    <link rel="stylesheet" type="text/css" href="/public/static/admin/css/style.css"/>-->
    <link rel="icon" href="/public/static/admin/image/code.png">
    <style>
        .login-body .login-box h3 {
            color: #444;
            font-size: 16px;
            /*background-color: #00aa00;*/
            text-align: left;
            height: 40px;
            line-height: 40px;
        }

        .login-box {
            position: fixed;
            top: -150px;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            width: 320px;
            height: 241px;
            max-height: 300px;
        }

        .login-box .layui-input[type='number'] {
            display: inline-block;
            width: 50%;
            vertical-align: top;
        }

        .login-box button[type='button'] {
            width: 190px;
        }
    </style>
</head>
<body class="login-body">

<div class="login-box">
    <form class="layui-form layui-form-pane" action="<?php echo \Yii::$app->request->hostInfo; ?>/login/index"
          method="post">
        <h3>Edu-tool.com在线管理系统</h3>
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-block">
                <input type="text" name="LoginForm[username]" autocomplete="off" placeholder="请输入用户名"
                       class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-inline">
                <input type="password" name="LoginForm[password]" placeholder="请输入密码" autocomplete="off"
                       class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <button class="layui-btn" lay-submit="" lay-filter="demo2">跳转式提交</button>
        </div>
    </form>
</div>

<script type="text/javascript" src="<?php echo \Yii::$app->request->hostInfo; ?>/layui/lay/dest/layui.all.js"></script>
<script type="text/javascript">
    /* 解决登录页被嵌套问题js */
    var _topWin = window;
    while (_topWin != _topWin.parent.window) {
        _topWin = _topWin.parent.window;
    }
    if (window != _topWin) _topWin.document.location.href = "<?php echo \Yii::$app->request->hostInfo; ?>/login/index";

    layui.use(['form', 'layer'], function () {
        var $ = layui.jquery, form = layui.form(), layer = layui.layer;


        console.log(window);

    })

</script>
</body>
</html>