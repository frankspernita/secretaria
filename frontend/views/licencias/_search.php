<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\LicenciasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="licencias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idLicencia') ?>

    <?= $form->field($model, 'Actuacion') ?>

    <?= $form->field($model, 'Desde') ?>

    <?= $form->field($model, 'Hasta') ?>

    <?= $form->field($model, 'ConSueldo') ?>

    <?php // echo $form->field($model, 'Detalle') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <?php // echo $form->field($model, 'cargodocentes_idDocente') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
