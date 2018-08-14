<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ABTests;

/**
 * ABTestsSearch represents the model behind the search form of `\common\models\ABTests`.
 */
class ABTestsSearch extends ABTests
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'page1_hits', 'page2_hits'], 'integer'],
            [['name', 'code', 'page1', 'page2'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = ABTests::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'page1_hits' => $this->page1_hits,
            'page2_hits' => $this->page2_hits,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'page1', $this->page1])
            ->andFilterWhere(['like', 'page2', $this->page2]);

        return $dataProvider;
    }
}
