<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TipoTitulos */

$this->title = 'Crear Tipo Titulos';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Titulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-titulos-create">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->

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
