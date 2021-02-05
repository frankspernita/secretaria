<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "domicilios".
 *
 * @property int $idDomicilio
 * @property int $idDatosP
 * @property string $Calle
 * @property string $Numero
 * @property string $Dpto
 * @property string $Piso
 * @property int $Npuerta
 * @property string $Localidad
 * @property int $Cpostal
 * @property string $Estado
 */
class Domicilios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'domicilios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Calle', 'Localidad', 'Cpostal'], 'required'],
            [['idDatosP', 'Npuerta', 'Cpostal'], 'integer'],
            [['Calle', 'Numero', 'Dpto', 'Piso', 'Localidad'], 'string', 'max' => 100],
            [['Estado'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDomicilio' => 'Id Domicilio',
            'idDatosP' => 'Id Datos P',
            'Calle' => 'Calle',
            'Numero' => 'Numero',
            'Dpto' => 'Dpto',
            'Piso' => 'Piso',
            'Npuerta' => 'Npuerta',
            'Localidad' => 'Localidad',
            'Cpostal' => 'Cpostal',
            'Estado' => 'Estado',
        ];
    }
}
