<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\NoDocentes */

$this->title = 'Modificar No Docentes: ' . $model->idNoDocente;
$this->params['breadcrumbs'][] = ['label' => 'No Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNoDocente, 'url' => ['view', 'id' => $model->idNoDocente]];
?>
<div class="no-docentes-update">

    <div class="row">
    <div class="col-sm-6">


    <div class="box box-primary">

    <?= $this->render('_form', [
        'model' => $model,
        'listaPersonas' => $listaPersonas,
    ]) ?>
    </div>
   </div>
   </div>

</div>
