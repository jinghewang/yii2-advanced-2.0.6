<?php

namespace api\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use api\models\Organization;

/**
 * OrganizationSearch represents the model behind the search form about `api\models\Organization`.
 */
class OrganizationSearch extends Organization
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orgid', 'name', 'parentid', 'enname', 'vercode', 'seal', 'logo', 'teltext', 'createuserid', 'createtime', 'extra_data'], 'safe'],
            [['lft', 'rgt', 'level', 'isdelete'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Organization::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'lft' => $this->lft,
            'rgt' => $this->rgt,
            'level' => $this->level,
            'createtime' => $this->createtime,
            'isdelete' => $this->isdelete,
        ]);

        $query->andFilterWhere(['like', 'orgid', $this->orgid])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'parentid', $this->parentid])
            ->andFilterWhere(['like', 'enname', $this->enname])
            ->andFilterWhere(['like', 'vercode', $this->vercode])
            ->andFilterWhere(['like', 'seal', $this->seal])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'teltext', $this->teltext])
            ->andFilterWhere(['like', 'createuserid', $this->createuserid])
            ->andFilterWhere(['like', 'extra_data', $this->extra_data]);

        return $dataProvider;
    }
}
