<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CargoayudantesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cargoayudantes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idCargoAyudante') ?>

    <?= $form->field($model, 'idDatosP') ?>

    <?= $form->field($model, 'Legajo') ?>

    <?= $form->field($model, 'Carrera') ?>

    <?= $form->field($model, 'idAsignatura') ?>

    <?php // echo $form->field($model, 'idResolucion') ?>

    <?php // echo $form->field($model, 'FechaInicio') ?>

    <?php // echo $form->field($model, 'FechaVenc') ?>

    <?php // echo $form->field($model, 'Expediente') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
