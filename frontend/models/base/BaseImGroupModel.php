<?php

namespace frontend\models\base;

use Yii;

/**
 * This is the model class for table "{{%group}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $uid
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $avatar
 */
class BaseImGroupModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'created_at', 'updated_at'], 'required'],
            [['uid', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['avatar'], 'string', 'max' => 50],
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
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'avatar' => 'Avatar',
        ];
    }
}
