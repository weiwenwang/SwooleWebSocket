<?php

namespace console\controllers;

use \yii\console\Controller;

/**
 * Created by PhpStorm.
 * User: Wang
 * Date: 17/3/18
 * Time: 上午9:14
 */
class ChatController extends Controller
{
    public function actionStart()
    {
        $server = new \swoole_websocket_server("0.0.0.0", 9502);//0.0.0.0表示广播消息； 9502是刚才前端页面中定好的通信端口
        $server->on('open', function (\swoole_websocket_server $server, $request) {
            $ids = explode('/', $request->server['path_info']);
            \yii::$app->redis->set('user:' . $ids[2], $request->fd);
            echo "server: (user) handshake success with fd{$request->fd}\n";//$request->fd 是客户端id
        });
        $server->on('message', function (\swoole_websocket_server $server, $frame) {
            echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
            //$frame->fd 是客户端id，$frame->data是客户端发送的数据
            //服务端向客户端发送数据是用 $server->push( '客户端id' ,  '内容')
            $data = json_decode($frame->data, true);
            if ($data['type'] == 'chatMessage') {
                $fd = \yii::$app->redis->get('user:' . $data['data']['to']['id']);
                $da = [
                    'username' => $data['data']['mine']['username'],
                    'avatar' => "http://im.yii.com/img/" . $data['data']['mine']['id'] . ".jpg",
                    'id' => $data['data']['mine']['id'],
                    'type' => $data['data']['to']['type'],
                    'content' => $data['data']['mine']['content'],
                    'mine' => false,
                    'timestamp' => time() * 1000,
                ];
                $ret = [
                    'type' => 'chatMessage',
                    'data' => $da
                ];
                $server->push($fd, json_encode($ret));//循环广播
            }
        });
        $server->on('close', function ($ser, $fd) {
            echo "client {$fd} closed\n";
        });
        $server->start();

    }

}