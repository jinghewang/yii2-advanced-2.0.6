<?php

namespace api\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "access_app".
 *
 * @property string $appkey
 * @property string $appname
 * @property string $client_id
 * @property string $client_secret
 * @property string $created
 * @property string $modified
 */
class AccessApp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'access_app';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['appkey'], 'required'],
            [['created', 'modified'], 'safe'],
            [['appkey'], 'string', 'max' => 50],
            [['appname', 'client_id', 'client_secret'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'appkey' => '应用标识',
            'appname' => '应用名称',
            'client_id' => 'Client Id',
            'client_secret' => 'Client Secret',
            'created' => '创建时间',
            'modified' => '修改时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'uid']);
    }
}
