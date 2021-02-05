<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "areaasignatura".
 *
 * @property int $idAreaAsignatura
 * @property int $idArea
 * @property int $idAsignatura
 * @property string $Estado
 */
class Areaasignatura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'areaasignatura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idArea', 'idAsignatura'], 'required'],
            [['idArea', 'idAsignatura'], 'integer'],
            [['Estado'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idAreaAsignatura' => 'Id Area Asignatura',
            'idArea' => 'Id Area',
            'idAsignatura' => 'Id Asignatura',
            'Estado' => 'Estado',
        ];
    }
}
