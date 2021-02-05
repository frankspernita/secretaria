<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Licencias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="licencias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Actuacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Desde')->textInput() ?>

    <?= $form->field($model, 'Hasta')->textInput() ?>

    <?= $form->field($model, 'ConSueldo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Detalle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cargodocentes_idDocente')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
