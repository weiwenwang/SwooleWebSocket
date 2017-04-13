<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the model class for table "{{%fri}}".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $f_uid
 * @property integer $g_id
 */
class BaseImFriModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%fri}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'f_uid', 'g_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'f_uid' => 'F Uid',
            'g_id' => 'G ID',
        ];
    }
}
