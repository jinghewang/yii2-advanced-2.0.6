<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "traveller".
 *
 * @property integer $contr_id
 * @property string $name
 * @property integer $sex
 * @property string $birthday
 * @property string $nation
 * @property string $folk
 * @property string $mobile
 * @property integer $idtype
 * @property string $idcode
 * @property string $addr
 * @property integer $no
 * @property integer $is_leader
 * @property string $extra_data
 */
class Traveller extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'traveller';
    }

    const LEADER_YES='1';
    const LEADER_NO='0';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contr_id'], 'required'],
            [['contr_id', 'sex', 'idtype', 'no', 'is_leader'], 'integer'],
            [['birthday'], 'safe'],
            [['extra_data'], 'string'],
            [['name'], 'string', 'max' => 20],
            [['nation', 'folk'], 'string', 'max' => 50],
            [['mobile'], 'string', 'max' => 15],
            [['idcode'], 'string', 'max' => 40],
            [['addr'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'contr_id' => '合同id',
            'name' => '姓名',
            'sex' => '性别',
            'birthday' => '生日',
            'nation' => '国籍',
            'folk' => '民族',
            'mobile' => '手机号',
            'idtype' => '证件类型',
            'idcode' => '证件号码',
            'addr' => '住址',
            'no' => '名单序号',
            'is_leader' => '是否是代表',
            'extra_data' => '暂定旅游代表的其它信息
            addr 住所
            fax 传真
            zip 邮编
            mail 邮箱',
        ];
    }
}
