<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DomiciliosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="domicilios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idDomicilio') ?>

    <?= $form->field($model, 'idDatosP') ?>

    <?= $form->field($model, 'Calle') ?>

    <?= $form->field($model, 'Numero') ?>

    <?= $form->field($model, 'Dpto') ?>

    <?php // echo $form->field($model, 'Piso') ?>

    <?php // echo $form->field($model, 'Npuerta') ?>

    <?php // echo $form->field($model, 'Localidad') ?>

    <?php // echo $form->field($model, 'Cpostal') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
