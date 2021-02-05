<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cargodocentes".
 *
 * @property int $idDocente
 * @property string $FechaInicio
 * @property string $Categoria
 * @property int $idDatosP
 * @property string $Dedicacion
 * @property string $Condicion
 * @property int $idDepartamento
 * @property int $Puntaje
 * @property string $idResolucion
 * @property string $FechaVenc
 * @property string $Observacion
 * @property string $Estado
 */
class Cargodocentes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargodocentes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'Categoria', 'idDatosP', 'Dedicacion', 'Condicion', 'Puntaje', 'Designacion'], 'required'],
            [['idDatosP', 'idDepartamento'], 'integer'],
            [['Categoria'], 'string', 'max' => 100],
            [['Dedicacion', 'Condicion'], 'string', 'max' => 20],
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
            'idDocente' => 'Id Docente',
            'Categoria' => 'Categoria',
            'idDatosP' => 'Id Datos P',
            'Dedicacion' => 'Dedicacion',
            'Designacion' => 'Designacion',
            'Condicion' => 'Condicion',
            'idDepartamento' => 'Departamento',
            'Puntaje' => 'Puntaje',
            'Observacion' => 'Observacion',
            'Estado' => 'Estado',
        ];
    }

    public function getDatosPersonales()
    {
        return $this->hasOne(DatosPersonales::className(), ['idDatosP' => 'idDatosP']);
    }

   
}
