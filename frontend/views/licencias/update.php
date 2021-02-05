<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Licencias */

$this->title = 'Update Licencias: ' . $model->idLicencia;
$this->params['breadcrumbs'][] = ['label' => 'Licencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idLicencia, 'url' => ['view', 'id' => $model->idLicencia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="licencias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
