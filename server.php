<?php

$server = new swoole_websocket_server("0.0.0.0", 9502);//0.0.0.0表示广播消息； 9502是刚才前端页面中定好的通信端口

$server->set(array(
    'heartbeat_check_interval' => 3,
    'heartbeat_idle_time' => 5,
));

$server->on('open', function (swoole_websocket_server $server, $request) {
//    var_dump($request);
    echo "server: handshake success with fd{$request->fd}\n";//$request->fd 是客户端id

});

$server->on('message', function (swoole_websocket_server $server, $frame) {

    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";

    //$frame->fd 是客户端id，$frame->data是客户端发送的数据

    //服务端向客户端发送数据是用 $server->push( '客户端id' ,  '内容')
    $data = $frame->data;
    foreach ($server->connections as $fd) {
        if ($fd != $frame->fd) { // 不要发给自己
	    if (substr($data, 0, 9) != 'HeartBeat') {
		$server->push($fd, $data);//循环广播
            }
        }
    }

});

$server->on('close', function ($ser, $fd) {

    echo "client {$fd} closed\n";

});

$server->start();
