<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "datospersonalestitulo".
 *
 * @property int $idDatosPTitulos
 * @property int $idDatosP
 * @property int $idTitulo
 * @property string $Estado
 */
class Datospersonalestitulo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'datospersonalestitulo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDatosP', 'idTitulo', 'Estado'], 'required'],
            [['idDatosP', 'idTitulo'], 'integer'],
            [['Estado'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDatosPTitulos' => 'Id Datos P Titulos',
            'idDatosP' => 'Id Datos P',
            'idTitulo' => 'Id Titulo',
            'Estado' => 'Estado',
        ];
    }
}
