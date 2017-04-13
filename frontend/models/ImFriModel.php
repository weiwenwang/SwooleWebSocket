<?php

namespace frontend\models;


use frontend\models\base\BaseImFriModel;

class ImFriModel extends BaseImFriModel
{
    public static function getList($uid, $g_id)
    {
        $where = ['uid' => $uid, 'g_id' => $g_id];
        $query = self::find()->where($where);
        $list = $query->asArray()->all();
        $user = [];
        foreach ($list as $key => $value) {
            $one = User::find()->select(['id', 'email', 'username',])->where(['id' => $value['f_uid']])->asArray()->one();
            $one['avatar'] = \Yii::$app->request->hostInfo . "/img/" . $one['id'] . '.jpg';
            $user[] = $one;
        }
        return $user;
    }

}
