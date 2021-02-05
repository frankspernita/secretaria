<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Datospersonalestitulo;

/**
 * DatospersonalestituloSearch represents the model behind the search form of `frontend\models\Datospersonalestitulo`.
 */
class DatospersonalestituloSearch extends Datospersonalestitulo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDatosPTitulos', 'idDatosP', 'idTitulo'], 'integer'],
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
        $query = Datospersonalestitulo::find();

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
            'idDatosPTitulos' => $this->idDatosPTitulos,
            'idDatosP' => $this->idDatosP,
            'idTitulo' => $this->idTitulo,
        ]);

        $query->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
