<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "titulos".
 *
 * @property int $idTitulo
 * @property int $idDatosP
 * @property int $idTipoTitulo
 * @property int $Legajo
 * @property string $Nombre
 * @property string $Fecha
 * @property string $Codigo
 * @property string $Estado
 */
class Titulos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'titulos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idTipoTitulo', 'Legajo', 'Nombre', 'Fecha', 'Codigo'], 'required'],
            [['idDatosP', 'idTipoTitulo', 'Legajo'], 'integer'],
            [['Fecha'], 'safe'],
            [['Nombre', 'Codigo'], 'string', 'max' => 50],
            [['Estado'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTitulo' => 'Id Titulo',
            'idDatosP' => 'Id Datos P',
            'idTipoTitulo' => 'Id Tipo Titulo',
            'Legajo' => 'Legajo',
            'Nombre' => 'Nombre',
            'Fecha' => 'Fecha',
            'Codigo' => 'Codigo',
            'Estado' => 'Estado',
        ];
    }

    public function getDatosPersonales()
    {
        return $this->hasOne(DatosPersonales::className(), ['idDatosP' => 'idDatosP']);
    }

    public function getTipoTitulos()
    {
        return $this->hasOne(TipoTitulos::className(), ['idTipoTitulo' => 'idTipoTitulo']);
    }
}
