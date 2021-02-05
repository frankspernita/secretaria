<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "datos_personales".
 *
 * @property int $idDatosP
 * @property string $Apellido
 * @property string $Nombre
 * @property string $FechaNac
 * @property int $DNI
 * @property string $Cuil
 * @property string $Email
 * @property string $TelFijo
 * @property string $Celular
 * @property string $Tipo
 * @property string $Estado
 */
class DatosPersonales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'datos_personales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Apellido', 'Nombre', 'FechaNac', 'DNI', 'Cuil', 'Email'], 'required'],
            [['FechaNac'], 'safe'],
            [['DNI'], 'integer'],
            [['Apellido', 'Nombre', 'Email', 'TelFijo', 'Celular'], 'string', 'max' => 100],
            [['Cuil'], 'string', 'max' => 20],
            [['Tipo', 'Estado'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDatosP' => 'Id Datos P',
            'Apellido' => 'Apellido',
            'Nombre' => 'Nombre',
            'FechaNac' => 'Fecha Nac',
            'DNI' => 'Dni',
            'Cuil' => 'Cuil',
            'Email' => 'Email',
            'TelFijo' => 'Tel Fijo',
            'Celular' => 'Celular',
            'Tipo' => 'Tipo',
            'Estado' => 'Estado',
        ];
    }

    public function getDomicilio()
    {
        return $this->hasMany(Domicilios::className(), ['idDatosP' => 'idDatosP']);
    }
}
