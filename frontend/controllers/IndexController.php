<?php

namespace frontend\controllers;

use frontend\models\base\BaseImFriGroupModel;
use frontend\models\base\BaseImFriModel;
use frontend\models\base\BaseImGroupModel;
use frontend\models\ImFriModel;
use frontend\models\ToolOrganization;
use frontend\models\User;
use yii;

class IndexController extends CommonController
{
    public function actionIndex()
    {
        $this->layout = false;
        $id = Yii::$app->session->get('__id');

        $all = BaseImGroupModel::find()->where(['uid' => $id])->asArray()->all();
        foreach ($all as $key => &$value) {
            $value['avatar'] = \Yii::$app->request->hostInfo . "/img/" . $value['avatar'];
        }

        $group_info = json_encode($all);

        $my_info = User::find()->where(['id' => $id])->asArray()->one();


        $my_info = [
            'name' => $my_info['username'],
            'id' => $my_info['id'],
            'status' => 'online',
            'sign' => '我的签名',
        ];

        $fri_group = BaseImFriGroupModel::find()->where(['uid' => $id])->asArray()->all();
        foreach ($fri_group as $key => &$value) {
            $fri_group[$key]['groupname'] = $fri_group[$key]['name'];
            $fri_group[$key]['list'] = ImFriModel::getList($id, $value['id']);
        }

//        echo "<pre>";
//        print_r($fri_group);
//        die;
        $fri_info = json_encode($fri_group);
//        echo $fri_info;
//        die;
        return $this->render('index', [
            'my_info' => $my_info,
            'group_info' => $group_info,
            'fri_info' => $fri_info,

        ]);
    }

    public function actionDisk()
    {
        $this->layout = false;
        return $this->render('disk');
    }

}