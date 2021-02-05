<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Datospersonalestitulo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datospersonalestitulo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idDatosP')->textInput() ?>

    <?= $form->field($model, 'idTitulo')->textInput() ?>

    <?= $form->field($model, 'Estado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
