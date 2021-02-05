<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TitulosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="titulos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idTitulo') ?>

    <?= $form->field($model, 'idDatosP') ?>

    <?= $form->field($model, 'idTipoTitulo') ?>

    <?= $form->field($model, 'Legajo') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?php // echo $form->field($model, 'Fecha') ?>

    <?php // echo $form->field($model, 'Codigo') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
