<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "Tipotitulos".
 *
 * @property int $idTipoTitulo
 * @property string $Descripcion
 * @property string $Estado
 */
class TipoTitulos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Tipotitulos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Descripcion'], 'required'],
            [['Descripcion'], 'string', 'max' => 50],
            [['Estado'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTipoTitulo' => 'Id Tipo Titulo',
            'Descripcion' => 'Descripcion',
            'Estado' => 'Estado',
        ];
    }
}
