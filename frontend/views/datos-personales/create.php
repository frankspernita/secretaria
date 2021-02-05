<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\DatosPersonales */

$this->title = 'Crear Datos Personales';
//$this->params['breadcrumbs'][] = ['label' => 'Datos Personales', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datos-personales-create">

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
