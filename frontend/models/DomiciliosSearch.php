<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Domicilios;

/**
 * DomiciliosSearch represents the model behind the search form of `frontend\models\Domicilios`.
 */
class DomiciliosSearch extends Domicilios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDomicilio', 'idDatosP', 'Npuerta', 'Cpostal'], 'integer'],
            [['Calle', 'Numero', 'Dpto', 'Piso', 'Localidad', 'Estado'], 'safe'],
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
        $query = Domicilios::find();

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
            'idDomicilio' => $this->idDomicilio,
            'idDatosP' => $this->idDatosP,
            'Npuerta' => $this->Npuerta,
            'Cpostal' => $this->Cpostal,
        ]);

        $query->andFilterWhere(['like', 'Calle', $this->Calle])
            ->andFilterWhere(['like', 'Numero', $this->Numero])
            ->andFilterWhere(['like', 'Dpto', $this->Dpto])
            ->andFilterWhere(['like', 'Piso', $this->Piso])
            ->andFilterWhere(['like', 'Localidad', $this->Localidad])
            ->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
