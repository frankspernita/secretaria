<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "secretaria".
 *
 * @property int $idSecretaria
 * @property string $Apellido
 * @property string $Nombre
 * @property string $FechaNac
 * @property int $DNI
 * @property string $Cuil
 * @property string $Email
 * @property string $TelFijo
 * @property string $Celular
 * @property string $Estado
 */
class Secretaria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'secretaria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Apellido', 'Nombre', 'FechaNac', 'DNI', 'Cuil', 'Email','idUser'], 'required'],
            [['FechaNac'], 'safe'],
            [['DNI'], 'integer'],
            [['Apellido', 'Nombre', 'Email', 'TelFijo', 'Celular'], 'string', 'max' => 100],
            [['Cuil'], 'string', 'max' => 20],
            [['Estado'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idSecretaria' => 'Id Secretaria',
            'idUser' => 'Id User',
            'Apellido' => 'Apellido',
            'Nombre' => 'Nombre',
            'FechaNac' => 'Fecha Nac',
            'DNI' => 'Dni',
            'Cuil' => 'Cuil',
            'Email' => 'Email',
            'TelFijo' => 'Tel Fijo',
            'Celular' => 'Celular',
            'Estado' => 'Estado',
        ];
    }
}
