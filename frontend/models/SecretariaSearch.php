<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Secretaria;

/**
 * SecretariaSearch represents the model behind the search form of `frontend\models\Secretaria`.
 */
class SecretariaSearch extends Secretaria
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idSecretaria', 'DNI', 'idUser'], 'integer'],
            [['Apellido', 'Nombre', 'FechaNac', 'Cuil', 'Email', 'TelFijo', 'Celular', 'Estado'], 'safe'],
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
        $query = Secretaria::find();

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
            'idSecretaria' => $this->idSecretaria,
            'idUser' => $this->idUser,
            'FechaNac' => $this->FechaNac,
            'DNI' => $this->DNI,
        ]);

        $query->andFilterWhere(['like', 'Apellido', $this->Apellido])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Cuil', $this->Cuil])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'TelFijo', $this->TelFijo])
            ->andFilterWhere(['like', 'Celular', $this->Celular])
            ->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
