<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Cargoayudantes;

/**
 * CargoayudantesSearch represents the model behind the search form of `frontend\models\Cargoayudantes`.
 */
class CargoayudantesSearch extends Cargoayudantes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCargoAyudante', 'idDatosP', 'idAsignatura', 'idResolucion'], 'integer'],
            [['Legajo', 'Carrera', 'Expediente', 'Estado', 'idDepartamento'], 'safe'],
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
        $query = Cargoayudantes::find();

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
            'idCargoAyudante' => $this->idCargoAyudante,
            'idDatosP' => $this->idDatosP,
            'idAsignatura' => $this->idAsignatura,
            'idDepartamento' => $this->idDepartamento,
            'idResolucion' => $this->idResolucion,
        ]);

        $query->andFilterWhere(['like', 'Legajo', $this->Legajo])
            ->andFilterWhere(['like', 'Carrera', $this->Carrera])
            ->andFilterWhere(['like', 'Expediente', $this->Expediente])
            ->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
