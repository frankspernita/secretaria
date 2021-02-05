<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Licencias;

/**
 * LicenciasSearch represents the model behind the search form of `frontend\models\Licencias`.
 */
class LicenciasSearch extends Licencias
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idLicencia', 'cargodocentes_idDocente'], 'integer'],
            [['Actuacion', 'Desde', 'Hasta', 'ConSueldo', 'Detalle', 'Estado'], 'safe'],
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
        $query = Licencias::find();

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
            'idLicencia' => $this->idLicencia,
            'Desde' => $this->Desde,
            'Hasta' => $this->Hasta,
            'cargodocentes_idDocente' => $this->cargodocentes_idDocente,
        ]);

        $query->andFilterWhere(['like', 'Actuacion', $this->Actuacion])
            ->andFilterWhere(['like', 'ConSueldo', $this->ConSueldo])
            ->andFilterWhere(['like', 'Detalle', $this->Detalle])
            ->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
