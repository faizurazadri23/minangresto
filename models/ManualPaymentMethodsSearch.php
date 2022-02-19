<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ManualPaymentMethods;

/**
 * ManualPaymentMethodsSearch represents the model behind the search form of `app\models\ManualPaymentMethods`.
 */
class ManualPaymentMethodsSearch extends ManualPaymentMethods
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['type_id', 'heading', 'description', 'bank_info', 'photo', 'create_at', 'update_at'], 'safe'],
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
        $query = ManualPaymentMethods::find();

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
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'type_id', $this->type_id])
            ->andFilterWhere(['like', 'heading', $this->heading])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'bank_info', $this->bank_info])
            ->andFilterWhere(['like', 'photo', $this->photo]);

        return $dataProvider;
    }
}
