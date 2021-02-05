<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Areaasignatura;

/**
 * AreaasignaturaSearch represents the model behind the search form of `frontend\models\Areaasignatura`.
 */
class AreaasignaturaSearch extends Areaasignatura
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idAreaAsignatura', 'idArea', 'idAsignatura'], 'integer'],
            [['Estado'], 'safe'],
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
        $query = Areaasignatura::find();

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
            'idAreaAsignatura' => $this->idAreaAsignatura,
            'idArea' => $this->idArea,
            'idAsignatura' => $this->idAsignatura,
        ]);

        $query->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
