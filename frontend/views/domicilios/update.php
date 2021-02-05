<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Domicilios */

$this->title = 'Update Domicilios: ' . $model->idDomicilio;
$this->params['breadcrumbs'][] = ['label' => 'Domicilios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDomicilio, 'url' => ['view', 'id' => $model->idDomicilio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="domicilios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
