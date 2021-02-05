<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "departamentosnodocentes".
 *
 * @property int $idDepartamentoNoDocente
 * @property int $idDepartamento
 * @property int $idNoDocente
 * @property string $Estado
 */
class Departamentosnodocentes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departamentosnodocentes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDepartamento', 'idNoDocente', 'Estado'], 'required'],
            [['idDepartamento', 'idNoDocente'], 'integer'],
            [['Estado'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDepartamentoNoDocente' => 'Id Departamento No Docente',
            'idDepartamento' => 'Id Departamento',
            'idNoDocente' => 'Id No Docente',
            'Estado' => 'Estado',
        ];
    }
}
