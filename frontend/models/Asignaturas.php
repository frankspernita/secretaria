<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "asignaturas".
 *
 * @property int $idAsignatura
 * @property int $idArea
 * @property string $Asignatura
 * @property int $Modulo
 * @property string $Estado
 */
class Asignaturas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asignaturas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idArea', 'Asignatura', 'Modulo'], 'required'],
            [['idArea', 'Modulo', 'idDepartamento'], 'integer'],
            [['Asignatura'], 'string', 'max' => 50],
            [['Estado'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idAsignatura' => 'Id Asignatura',
            'idArea' => 'Id Area',
            'idDepartamento' => 'Departamento',
            'Asignatura' => 'Asignatura',
            'Modulo' => 'Modulo',
            'Estado' => 'Estado',
        ];
    }

    public function getAreas()
    {
        return $this->hasOne(Areas::className(), ['idArea' => 'idArea']);
    }
}
