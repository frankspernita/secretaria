<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Asignaturasdocentes */

$this->title = 'Cargar Asignatura';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignaturasdocentes-create">

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
