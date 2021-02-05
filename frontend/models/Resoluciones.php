<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "resoluciones".
 *
 * @property int $idResolucion
 * @property string $Resolucion
 * @property string $FechaInicio
 * @property string $FechaVencimiento
 * @property string $Estado
 */
class Resoluciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resoluciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Resolucion', 'FechaInicio', 'FechaVencimiento'], 'required'],
            [['FechaInicio', 'FechaVencimiento', 'idDepartamento'], 'safe'],
            [['Resolucion'], 'string', 'max' => 50],
            [['Estado'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idResolucion' => 'Resolucion',
            'idDepartamento' => 'Departamento',
            'Resolucion' => 'Resolucion',
            'FechaInicio' => 'Fecha Inicio',
            'FechaVencimiento' => 'Fecha Vencimiento',
            'Estado' => 'Estado',
        ];
    }
}
