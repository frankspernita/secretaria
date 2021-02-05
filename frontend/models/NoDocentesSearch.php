<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Nodocentes;

/**
 * NodocentesSearch represents the model behind the search form of `frontend\models\Nodocentes`.
 */
class NodocentesSearch extends Nodocentes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idNoDocente', 'idDatosP'], 'integer'],
            [['Categoria', 'Ocupacion', 'Observacion', 'Estado', 'idDepartamento'], 'safe'],
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
        $query = Nodocentes::find();

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
            'idNoDocente' => $this->idNoDocente,
            'idDatosP' => $this->idDatosP,
            'idDepartamento' => $this->idDepartamento,
        ]);

        $query->andFilterWhere(['like', 'Categoria', $this->Categoria])
            ->andFilterWhere(['like', 'Ocupacion', $this->Ocupacion])
            ->andFilterWhere(['like', 'Observacion', $this->Observacion])
            ->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
