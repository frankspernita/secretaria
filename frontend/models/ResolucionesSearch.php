<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Resoluciones;

/**
 * ResolucionesSearch represents the model behind the search form of `frontend\models\Resoluciones`.
 */
class ResolucionesSearch extends Resoluciones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idResolucion'], 'integer'],
            [['Resolucion', 'FechaInicio', 'FechaVencimiento', 'Estado', 'idDepartamento'], 'safe'],
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
        $query = Resoluciones::find();

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
            'idResolucion' => $this->idResolucion,
            'idDepartamento' => $this->idDepartamento,
            'FechaInicio' => $this->FechaInicio,
            'FechaVencimiento' => $this->FechaVencimiento,
        ]);

        $query->andFilterWhere(['like', 'Resolucion', $this->Resolucion])
            ->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
