<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Resoluciones */

$this->title = 'Modificar Resolucion: ' . $model->idResolucion;
$this->params['breadcrumbs'][] = ['label' => 'Resoluciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idResolucion, 'url' => ['view', 'id' => $model->idResolucion]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="resoluciones-update">

    <div class="row">
    <div class="col-sm-6">


    <div class="box box-primary">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
   </div>
   </div>

</div>
