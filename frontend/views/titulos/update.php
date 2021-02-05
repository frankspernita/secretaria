<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Titulos */

$this->title = 'Modificar Titulo: ' . $model->idTitulo;
$this->params['breadcrumbs'][] = ['label' => 'Titulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTitulo, 'url' => ['view', 'id' => $model->idTitulo]];
?>
<div class="titulos-update">

    <div class="row">
    <div class="col-sm-6">


    <div class="box box-primary">

    <?= $this->render('_form', [
        'model' => $model,
        'listaTitulo' => $listaTitulo,
    ]) ?>
    </div>
   </div>
   </div>

</div>
