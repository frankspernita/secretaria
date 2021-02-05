<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Areaasignatura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="areaasignatura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idArea')->textInput() ?>

    <?= $form->field($model, 'idAsignatura')->textInput() ?>

    <?= $form->field($model, 'Estado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
