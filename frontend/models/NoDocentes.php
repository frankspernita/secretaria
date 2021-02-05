<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "nodocentes".
 *
 * @property int $idNoDocente
 * @property int $idDatosP
 * @property string $Categoria
 * @property string $Ocupacion
 * @property string $Observacion
 * @property string $Estado
 */
class Nodocentes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nodocentes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDatosP', 'Categoria', 'Ocupacion', 'Observacion'], 'required'],
            [['idDatosP', 'idDepartamento'], 'integer'],
            [['Categoria'], 'string', 'max' => 40],
            [['Ocupacion'], 'string', 'max' => 100],
            [['Observacion'], 'string', 'max' => 150],
            [['Estado'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idNoDocente' => 'No Docente',
            'idDatosP' => 'Datos Personales',
            'idDepartamento' => 'Departamento',
            'Categoria' => 'Categoria',
            'Ocupacion' => 'Ocupacion',
            'Observacion' => 'Observacion',
            'Estado' => 'Estado',
        ];
    }

    public function getDatosPersonales()
    {
        return $this->hasOne(DatosPersonales::className(), ['idDatosP' => 'idDatosP']);
    }
}
