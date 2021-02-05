<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Resoluciones */

$this->title = $model->Resolucion;
$this->params['breadcrumbs'][] = ['label' => 'Resoluciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="resoluciones-view">

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idResolucion], ['class' => 'btn btn-primary']) ?>
        <?= $model->Estado == 'Activo' ?
        Html::a('Dar de baja', ['delete', 'id' => $model->idResolucion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Dar de baja?',
                'method' => 'post',
            ],
        ]) :
        Html::a('Dar de alta', ['delete', 'id' => $model->idResolucion], [
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
            'Resolucion',
            'FechaInicio',
            'FechaVencimiento',
            'Estado',
        ],
    ]) ?>
 </div>
</div>
    

</div>