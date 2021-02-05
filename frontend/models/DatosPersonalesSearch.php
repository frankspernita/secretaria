<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\DatosPersonales;

/**
 * DatosPersonalesSearch represents the model behind the search form of `frontend\models\DatosPersonales`.
 */
class DatosPersonalesSearch extends DatosPersonales
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDatosP', 'DNI'], 'integer'],
            [['Apellido', 'Nombre', 'FechaNac', 'Cuil', 'Email', 'TelFijo', 'Celular', 'Tipo', 'Estado'], 'safe'],
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
        $query = DatosPersonales::find();

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
            'idDatosP' => $this->idDatosP,
            'FechaNac' => $this->FechaNac,
            'DNI' => $this->DNI,
        ]);

        $query->andFilterWhere(['like', 'Apellido', $this->Apellido])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Cuil', $this->Cuil])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'TelFijo', $this->TelFijo])
            ->andFilterWhere(['like', 'Celular', $this->Celular])
            ->andFilterWhere(['like', 'Tipo', $this->Tipo])
            ->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
