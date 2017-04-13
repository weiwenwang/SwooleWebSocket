<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the model class for table "{{%fri_group}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $uid
 */
class BaseImFriGroupModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%fri_group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'integer'],
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'uid' => 'Uid',
        ];
    }
}
