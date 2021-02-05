<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AsignaturasdocentesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asignaturasdocentes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idAsignaturaDocente') ?>

    <?= $form->field($model, 'idDocente') ?>

    <?= $form->field($model, 'idAsignatura') ?>

    <?= $form->field($model, 'idDepartamento') ?>

    <?= $form->field($model, 'idResolucion') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
