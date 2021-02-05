<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Asignaturas */

$this->title = 'Update Asignaturas: ' . $model->idAsignatura;
$this->params['breadcrumbs'][] = ['label' => 'Asignaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAsignatura, 'url' => ['view', 'id' => $model->idAsignatura]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asignaturas-update">

    <div class="row">
    <div class="col-sm-6">


    <div class="box box-primary">

    <?= $this->render('_form', [
        'model' => $model,
        'listaAreas' => $listaAreas,
    ]) ?>
    </div>
   </div>
   </div>

</div>
