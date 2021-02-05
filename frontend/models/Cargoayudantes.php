<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cargoayudantes".
 *
 * @property int $idCargoAyudante
 * @property int $idDatosP
 * @property string $Legajo
 * @property string $Carrera
 * @property int $idAsignatura
 * @property int $idResolucion
 * @property string $FechaInicio
 * @property string $FechaVenc
 * @property string $Expediente
 * @property string $Estado
 */
class Cargoayudantes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargoayudantes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDatosP', 'Legajo', 'Carrera', 'idAsignatura', 'idResolucion', 'Expediente'], 'required'],
            [['idDatosP', 'idAsignatura', 'idResolucion', 'idDepartamento'], 'integer'],
            [['Legajo', 'Expediente'], 'string', 'max' => 20],
            [['Carrera'], 'string', 'max' => 50],
            [['Estado'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCargoAyudante' => 'Cargo Ayudante',
            'idDatosP' => 'Datos Personales',
            'idDepartamento' => 'Departamento',
            'Legajo' => 'Legajo',
            'Carrera' => 'Carrera',
            'idAsignatura' => 'Asignatura',
            'idResolucion' => 'Resolucion',
            'Expediente' => 'Expediente',
            'Estado' => 'Estado',
        ];
    }

    public function getDatosPersonales()
    {
        return $this->hasOne(DatosPersonales::className(), ['idDatosP' => 'idDatosP']);
    }

    public function getAsignatura()
    {
        return $this->hasOne(Asignaturas::className(), ['idAsignatura' => 'idAsignatura']);
    }

    public function getResolucion()
    {
        return $this->hasOne(Resoluciones::className(), ['idResolucion' => 'idResolucion']);
    }
}
