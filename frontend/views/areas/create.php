<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Areas */

$this->title = 'Cargar Area';
$this->params['breadcrumbs'][] = ['label' => 'Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="areas-create">
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
