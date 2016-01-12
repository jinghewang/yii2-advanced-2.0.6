<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "routes".
 *
 * @property integer $id
 * @property integer $contr_id
 * @property integer $parentid
 * @property string $title
 * @property string $ctype
 * @property integer $transit
 * @property integer $index
 * @property string $from
 * @property string $aim_city
 * @property string $aim_country
 * @property string $sign
 * @property string $extra_data
 */
class Routes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'routes';
    }

    const ROUTE_TYPE_JOURNEY='journey';
    const ROUTE_TYPE_CITY='city';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'contr_id', 'parentid', 'transit', 'index'], 'integer'],
            [['extra_data'], 'string'],
            [['title'], 'string', 'max' => 200],
            [['ctype'], 'string', 'max' => 20],
            [['from', 'aim_city', 'aim_country'], 'string', 'max' => 100],
            [['sign'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contr_id' => '合同ID',
            'parentid' => '父id',
            'title' => '标题',
            'ctype' => '类目类型',
            'transit' => '过境',
            'index' => '排序',
            'from' => '出发地',
            'aim_city' => '前往城市',
            'aim_country' => '前往省份',
            'sign' => '签名',
            'extra_data' => 'Extra Data',
        ];
    }
}
