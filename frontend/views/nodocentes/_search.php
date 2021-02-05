<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\NodocentesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nodocentes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idNoDocente') ?>

    <?= $form->field($model, 'idDatosP') ?>

    <?= $form->field($model, 'Categoria') ?>

    <?= $form->field($model, 'Ocupacion') ?>

    <?= $form->field($model, 'Observacion') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
