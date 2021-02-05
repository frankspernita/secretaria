<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Resoluciones */

$this->title = 'Create Resoluciones';
$this->params['breadcrumbs'][] = ['label' => 'Resoluciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resoluciones-create">

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
