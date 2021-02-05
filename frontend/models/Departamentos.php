<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "departamentos".
 *
 * @property int $idDepartamento
 * @property int $idDatosP
 * @property string $Nombre
 * @property string $Estado
 */
class Departamentos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departamentos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDatosP', 'Nombre'], 'required'],
            [['idDatosP'], 'integer'],
            [['Nombre'], 'string', 'max' => 100],
            [['Estado'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDepartamento' => 'Id Departamento',
            'idDatosP' => 'Id Datos P',
            'Nombre' => 'Nombre',
            'Estado' => 'Estado',
        ];
    }

    public function getDatosPersonales()
    {
        return $this->hasOne(DatosPersonales::className(), ['idDatosP' => 'idDatosP']);
    }
}
