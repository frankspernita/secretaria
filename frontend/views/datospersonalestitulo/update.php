<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Datospersonalestitulo */

$this->title = 'Update Datospersonalestitulo: ' . $model->idDatosPTitulos;
$this->params['breadcrumbs'][] = ['label' => 'Datospersonalestitulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDatosPTitulos, 'url' => ['view', 'id' => $model->idDatosPTitulos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="datospersonalestitulo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
