<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DatosPersonalesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datos-personales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idDatosP') ?>

    <?= $form->field($model, 'Apellido') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'FechaNac') ?>

    <?= $form->field($model, 'DNI') ?>

    <?php // echo $form->field($model, 'Cuil') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'TelFijo') ?>

    <?php // echo $form->field($model, 'Celular') ?>

    <?php // echo $form->field($model, 'Tipo') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
