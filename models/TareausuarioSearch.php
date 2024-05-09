<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tareausuario;

/**
 * TareausuarioSearch represents the model behind the search form of `app\models\Tareausuario`.
 */
class TareausuarioSearch extends Tareausuario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tarusu_id', 'tarusu_fkusuario', 'tarusu_fktarea'], 'integer'],
            [['tarusu_tipo'], 'safe'],
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
        $query = Tareausuario::find();

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
            'tarusu_id' => $this->tarusu_id,
            'tarusu_fkusuario' => $this->tarusu_fkusuario,
            'tarusu_fktarea' => $this->tarusu_fktarea,
        ]);

        $query->andFilterWhere(['like', 'tarusu_tipo', $this->tarusu_tipo]);

        return $dataProvider;
    }
}
