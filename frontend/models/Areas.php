<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "areas".
 *
 * @property int $idArea
 * @property string $Area
 * @property string $Estado
 *
 * @property Asignaturas[] $asignaturas
 */
class Areas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'areas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Area'], 'required'],
            [['idDepartamento'], 'integer'],
            [['Area'], 'string', 'max' => 50],
            [['Estado'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idArea' => 'Id Area',
            'idDepartamento' => 'Id Departamento',
            'Area' => 'Area',
            'Estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturas()
    {
        return $this->hasMany(Asignaturas::className(), ['areas_idArea' => 'idArea']);
    }

    public function getDepartamentos()
    {
        return $this->hasOne(Departamentos::className(), ['idDepartamento' => 'idDepartamento']);
    }
}
