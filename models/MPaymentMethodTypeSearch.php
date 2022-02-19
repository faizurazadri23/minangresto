<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MPaymentMethodType;

/**
 * MPaymentMethodTypeSearch represents the model behind the search form of `app\models\MPaymentMethodType`.
 */
class MPaymentMethodTypeSearch extends MPaymentMethodType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'description', 'method_name'], 'safe'],
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
        $query = MPaymentMethodType::find();

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
        $query->andFilterWhere(['like', 'type_id', $this->type_id])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'method_name', $this->method_name]);

        return $dataProvider;
    }
}
