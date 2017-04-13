<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>教员列表</title>
    <link rel="stylesheet" href="<?php echo \Yii::$app->request->hostInfo; ?>/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="<?php echo \Yii::$app->request->hostInfo; ?>/css/style.css">
    <script src="<?php echo \Yii::$app->request->hostInfo; ?>/layui/layui.js"></script>
</head>
<body>


<script>
    layui.use('layim', function (layim) {
        var layim = layui.layim;
        layim.config({
            init: {
                mine: {
                    "username": "<?php echo $my_info['name'];?>" //我的昵称
                    , "id": "<?php echo $my_info['id'];?>" //我的ID
                    , "status": "<?php echo $my_info['status'];?>" //在线状态 online：在线、hide：隐身
                    , "sign": "<?php echo $my_info['sign'];?>" //我的签名
                    , "avatar": "<?php echo \Yii::$app->request->hostInfo; ?>/img/9295982.jpeg" //我的头像
                }
                , friend: <?php echo $fri_info;?>
                , group: <?php echo $group_info;?>
            },
            tool: [{
                alias: 'code' //工具别名
                , title: '代码' //工具名称
                , icon: '&#xe64e;' //工具图标，参考图标文档
            }],
            msgbox: layui.cache.dir + 'css/modules/layim/html/msgbox.html', //消息盒子页面地址，若不开启，剔除该项即可

            brief: false //是否简约模式（如果true则不显示主面板）
        }).chat({
            name: '客服姐姐'
            , type: 'kefu'
            , avatar: '<?php echo \Yii::$app->request->hostInfo; ?>/img/9295982.jpeg'
            , id: -2
        });

        //监听自定义工具栏点击，以添加代码为例
        layim.on('tool(code)', function (insert, send, obj) { //事件中的tool为固定字符，而code则为过滤器，对应的是工具别名（alias）
            layer.prompt({
                title: '插入代码'
                , formType: 2
                , shade: 0
            }, function (text, index) {
                layer.close(index);
                insert('[pre class=layui-code]' + text + '[/pre]'); //将内容插入到编辑器，主要由insert完成
                //send(); //自动发送
            });
            console.log(this); //获取当前工具的DOM对象
            console.log(obj); //获得当前会话窗口的DOM对象、基础信息
        });

        var socket = new WebSocket("ws://im.yii.com:9502/id/<?php echo $my_info['id'];?>");
        socket.onopen = function () {
            socket.send('XXX连接成功');
        };

        socket.onmessage = function (res) {
            data = JSON.parse(res.data);

            if (data.type === 'chatMessage') {
                layim.getMessage(data.data); //res.data即你发送消息传递的数据（阅读：监听发送的消息）
            }
        };

        layim.on('sendMessage', function (res) {
//            var mine = res.mine; //包含我发送的消息及我的信息
//            var to = res.to; //对方的信息
//
//            console.log(to);
//            console.log(mine);

            //监听到上述消息后，就可以轻松地发送socket了，如：
            var data = JSON.stringify({
                    type: 'chatMessage' //随便定义，用于在服务端区分消息类型
                    , data: res
                }
            );
            socket.send(data);
        });
    });
</script>
</body>
</html>