<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\NoDocentes */

$this->title = 'Cargar No Docente';
$this->params['breadcrumbs'][] = ['label' => 'No Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="no-docentes-create">

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
