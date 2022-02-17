<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OrderOnline;

/**
 * OrderOnlineSearch represents the model behind the search form of `app\models\OrderOnline`.
 */
class OrderOnlineSearch extends OrderOnline
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id_online', 'id_customer', 'order_date', 'payment_type'], 'safe'],
            [['manual_payment'], 'integer'],
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
        $query = OrderOnline::find();

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
            'order_date' => $this->order_date,
            'manual_payment' => $this->manual_payment,
        ]);

        $query->andFilterWhere(['like', 'order_id_online', $this->order_id_online])
            ->andFilterWhere(['like', 'id_customer', $this->id_customer])
            ->andFilterWhere(['like', 'payment_type', $this->payment_type]);

        return $dataProvider;
    }
}
