<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\DatosPersonales */

$this->title = $model->idDatosP;
//$this->params['breadcrumbs'][] = ['label' => 'Datos Personales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="datos-personales-view">

    

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idDatosP], ['class' => 'btn btn-primary']) ?>
        <?= $model->Estado == 'A' ?
        Html::a('Dar de baja', ['delete', 'id' => $model->idDatosP], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Dar de baja?',
                'method' => 'post',
            ],
        ]) :
        Html::a('Dar de alta', ['delete', 'id' => $model->idDatosP], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => '¿Dar de alta?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
            <div class="col-sm-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        //    'idDatosP',
            'Apellido',
            'Nombre',
            'FechaNac',
            'DNI',
            'Cuil',
            'Email:email',
            'TelFijo',
            'Celular',
        ],
    ]) ?>
</div>
</div>
    <div class="">
        <h3>Domicilios</h3>
    </div>
<div class="row">
            <div class="col-sm-12">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'Calle',
            'Numero',
            'Dpto',
            'Piso',
            'Npuerta',
            'Localidad',
            'Cpostal',
        ],
    ]); ?>
    </div>
</div>
    <?= Html::a('Volver', Url::to(['index']), ['class' => 'btn btn-primary']) ?>

</div>
