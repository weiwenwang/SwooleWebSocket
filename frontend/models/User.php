<?php

namespace frontend\models;

use Yii;

class User extends \common\models\User
{
    public static function findByUsername($username)
    {
        $where = [];
        if (strpos($username, "@") !== false) {
            $where['email'] = $username;
        } elseif (strlen($username) == 4) {
            $where['username'] = $username;
        } else {
            return null;
        }
        $where = array_merge($where, ['status' => self::STATUS_ACTIVE]);
        return static::findOne($where);
    }
}
