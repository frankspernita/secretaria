<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Domicilios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="domicilios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idDatosP')->textInput() ?>

    <?= $form->field($model, 'Calle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Dpto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Piso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Npuerta')->textInput() ?>

    <?= $form->field($model, 'Localidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cpostal')->textInput() ?>

    <?= $form->field($model, 'Estado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
