<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Departamentosnodocentes;

/**
 * DepartamentosnodocentesSearch represents the model behind the search form of `frontend\models\Departamentosnodocentes`.
 */
class DepartamentosnodocentesSearch extends Departamentosnodocentes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDepartamentoNoDocente', 'idDepartamento', 'idNoDocente'], 'integer'],
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
        $query = Departamentosnodocentes::find();

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
            'idDepartamentoNoDocente' => $this->idDepartamentoNoDocente,
            'idDepartamento' => $this->idDepartamento,
            'idNoDocente' => $this->idNoDocente,
        ]);

        $query->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
