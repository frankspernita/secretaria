<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Asignaturas;

/**
 * AsignaturasSearch represents the model behind the search form of `frontend\models\Asignaturas`.
 */
class AsignaturasSearch extends Asignaturas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idAsignatura', 'idArea', 'Modulo','idDepartamento'], 'integer'],
            [['Asignatura', 'Estado'], 'safe'],
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
        $query = Asignaturas::find();

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
            'idAsignatura' => $this->idAsignatura,
            'idArea' => $this->idArea,
            'idDepartamento' => $this->idDepartamento,
            'Modulo' => $this->Modulo,
        ]);

        $query->andFilterWhere(['like', 'Asignatura', $this->Asignatura])
            ->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
