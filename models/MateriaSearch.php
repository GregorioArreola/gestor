<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Materia;

/**
 * MateriaSearch represents the model behind the search form of `app\models\Materia`.
 */
class MateriaSearch extends Materia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mat_id', 'mat_fkperiodo'], 'integer'],
            [['mat_nombre'], 'safe'],
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
        $query = Materia::find();

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
            'mat_id' => $this->mat_id,
            'mat_fkperiodo' => $this->mat_fkperiodo,
        ]);

        $query->andFilterWhere(['like', 'mat_nombre', $this->mat_nombre]);

        return $dataProvider;
    }
}
