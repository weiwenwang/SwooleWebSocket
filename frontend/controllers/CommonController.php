<?php
namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class CommonController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
//                'only' => ['update'], //可以指定特定的action适用
                'rules' => [
                    //允许所有已登录的用户进入此页面
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    //未登录的用户将被指向登录页面
                ],
            ],
        ];
    }

    public function getId()
    {
        $id = Yii::$app->session->get('__id');
        return $id ? $id : null;
    }

}
