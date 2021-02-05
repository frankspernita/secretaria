<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Domicilios */

$this->title = $model->idDomicilio;
$this->params['breadcrumbs'][] = ['label' => 'Domicilios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="domicilios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idDomicilio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idDomicilio], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idDomicilio',
            'idDatosP',
            'Calle',
            'Numero',
            'Dpto',
            'Piso',
            'Npuerta',
            'Localidad',
            'Cpostal',
            'Estado',
        ],
    ]) ?>

</div>
