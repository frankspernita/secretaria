<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "asignaturasdocentes".
 *
 * @property int $idAsignaturaDocente
 * @property int $idDocente
 * @property int $idAsignatura
 * @property int $idDepartamento
 * @property int $idResolucion
 * @property string $Estado
 */
class Asignaturasdocentes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asignaturasdocentes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idAsignatura', 'idResolucion'], 'required'],
            [['idDocente', 'idAsignatura', 'idDepartamento', 'idResolucion'], 'integer'],
            [['Estado'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idAsignaturaDocente' => 'Id Asignatura Docente',
            'idDocente' => 'Id Docente',
            'idAsignatura' => 'Id Asignatura',
            'idDepartamento' => 'Id Departamento',
            'idResolucion' => 'Id Resolucion',
            'Estado' => 'Estado',
        ];
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
