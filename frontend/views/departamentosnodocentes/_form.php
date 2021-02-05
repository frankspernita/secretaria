<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Departamentosnodocentes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departamentosnodocentes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idDepartamento')->textInput() ?>

    <?= $form->field($model, 'idNoDocente')->textInput() ?>

    <?= $form->field($model, 'Estado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
