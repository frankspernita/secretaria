<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CargodocentesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cargodocentes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idDocente') ?>

    <?= $form->field($model, 'FechaInicio') ?>

    <?= $form->field($model, 'Categoria') ?>

    <?= $form->field($model, 'idDatosP') ?>

    <?= $form->field($model, 'Dedicacion') ?>

    <?= $form->field($model, 'idDepartamento') ?>

    <?php // echo $form->field($model, 'Condicion') ?>

    <?php // echo $form->field($model, 'idAsignatura') ?>

    <?php // echo $form->field($model, 'Puntaje') ?>

    <?php // echo $form->field($model, 'Resolucion') ?>

    <?php // echo $form->field($model, 'FechaVenc') ?>

    <?php // echo $form->field($model, 'Observacion') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
