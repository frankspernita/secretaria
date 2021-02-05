<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\DatosPersonales */

$this->title = 'Update Datos Personales: ' . $model->idDatosP;
$this->params['breadcrumbs'][] = ['label' => 'Datos Personales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDatosP, 'url' => ['view', 'id' => $model->idDatosP]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personas-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <div class="row">
        <div class="col-sm-6">
          <div class="box box-primary">
          <?= $this->render('_form', [
              'model' => $model,
              'modelsdomicilios' => $modelsdomicilios,
          ]) ?>
          </div>
        </div>
    </div>


</div>
