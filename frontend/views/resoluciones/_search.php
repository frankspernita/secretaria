<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ResolucionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resoluciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idResolucion') ?>

    <?= $form->field($model, 'Resolucion') ?>

    <?= $form->field($model, 'FechaInicio') ?>

    <?= $form->field($model, 'FechaVencimiento') ?>

    <?= $form->field($model, 'Estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
