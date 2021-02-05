<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Asignaturasdocentes */

$this->title = 'Modificar  Asignatura: ' . $model->idAsignaturaDocente;
$this->params['breadcrumbs'][] = ['label' => 'Asignaturasdocentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAsignaturaDocente, 'url' => ['view', 'id' => $model->idAsignaturaDocente]];
?>
<div class="asignaturasdocentes-update">

    <div class="row">
    <div class="col-sm-6">


    <div class="box box-primary">

    <?= $this->render('_form', [
        'model' => $model,
        'listaAsignatura' => $listaAsignatura,
        'listaResolucion' => $listaResolucion,
    ]) ?>
    </div>
   </div>
   </div>

</div>
