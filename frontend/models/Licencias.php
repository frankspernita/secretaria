<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "licencias".
 *
 * @property int $idLicencia
 * @property string $Actuacion
 * @property string $Desde
 * @property string $Hasta
 * @property string $ConSueldo
 * @property string $Detalle
 * @property string $Estado
 * @property int $cargodocentes_idDocente
 *
 * @property Cargodocentes $cargodocentesIdDocente
 */
class Licencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'licencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Actuacion', 'Desde', 'Hasta', 'ConSueldo', 'Detalle', 'Estado', 'cargodocentes_idDocente'], 'required'],
            [['Desde', 'Hasta'], 'safe'],
            [['cargodocentes_idDocente'], 'integer'],
            [['Actuacion'], 'string', 'max' => 20],
            [['ConSueldo', 'Estado'], 'string', 'max' => 1],
            [['Detalle'], 'string', 'max' => 150],
            [['cargodocentes_idDocente'], 'exist', 'skipOnError' => true, 'targetClass' => Cargodocentes::className(), 'targetAttribute' => ['cargodocentes_idDocente' => 'idDocente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLicencia' => 'Id Licencia',
            'Actuacion' => 'Actuacion',
            'Desde' => 'Desde',
            'Hasta' => 'Hasta',
            'ConSueldo' => 'Con Sueldo',
            'Detalle' => 'Detalle',
            'Estado' => 'Estado',
            'cargodocentes_idDocente' => 'Cargodocentes Id Docente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargodocentesIdDocente()
    {
        return $this->hasOne(Cargodocentes::className(), ['idDocente' => 'cargodocentes_idDocente']);
    }
}
