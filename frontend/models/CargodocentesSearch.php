<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Cargodocentes;

/**
 * CargodocentesSearch represents the model behind the search form of `frontend\models\Cargodocentes`.
 */
class CargodocentesSearch extends Cargodocentes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDocente', 'idDatosP',  'Puntaje'], 'integer'],
            [[ 'Categoria', 'Dedicacion', 'Designacion', 'Condicion', 'Observacion', 'Estado', 'idDepartamento'], 'safe'],
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
        $query = Cargodocentes::find();

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
            'idDocente' => $this->idDocente,
            'idDatosP' => $this->idDatosP,
            'Puntaje' => $this->Puntaje,
        ]);

        $query->andFilterWhere(['like', 'Categoria', $this->Categoria])
            ->andFilterWhere(['like', 'Dedicacion', $this->Dedicacion])
            ->andFilterWhere(['like', 'Condicion', $this->Condicion])
            ->andFilterWhere(['like', 'Designacion', $this->Designacion])
            ->andFilterWhere(['like', 'Observacion', $this->Observacion])
            ->andFilterWhere(['like', 'idDepartamento', $this->idDepartamento])
            ->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
