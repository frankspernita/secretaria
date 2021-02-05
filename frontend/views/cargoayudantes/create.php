<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cargoayudantes */

$this->title = 'Cargar Ayudante';
$this->params['breadcrumbs'][] = ['label' => 'Cargoayudantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargoayudantes-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div class="row">
    <div class="col-sm-6">


    <div class="box box-primary">

    <?= $this->render('_form', [
        'model' => $model,
        'listaPersonas' => $listaPersonas,
        'listaAsignatura' => $listaAsignatura,
        'listaResolucion' => $listaResolucion,
    ]) ?>
    </div>
   </div>
   </div>

</div>
