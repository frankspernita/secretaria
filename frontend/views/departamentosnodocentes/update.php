<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Departamentosnodocentes */

$this->title = 'Update Departamentosnodocentes: ' . $model->idDepartamentoNoDocente;
$this->params['breadcrumbs'][] = ['label' => 'Departamentosnodocentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDepartamentoNoDocente, 'url' => ['view', 'id' => $model->idDepartamentoNoDocente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="departamentosnodocentes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
