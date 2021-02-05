<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Areas */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="personas-form form">

    <?php $form = ActiveForm::begin(
      ['options' => [
                'role' => 'form',
             ],
       'id' => 'dynamic-form'
      ]
    ); ?>


    <div class="box-body">

    <div class="row">
        <div class="col-md-12">
    <?= $form->field($model, 'idDatosP')->dropDownList($listaPersonas, ['id' => 'por', 'prompt' => 'Seleccionar Personal'])->label('Personal para el Cargo')?>
        </div>
        <div class="col-md-12">
    <?= $form->field($model, 'Categoria')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12">
    <?= $form->field($model, 'Ocupacion')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12">
    <?= $form->field($model, 'Observacion')->textInput(['maxlength' => true]) ?>
        </div>
        

    </div>

    </div>        

    <div class="box-footer">
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>
    </div>

    <?php ActiveForm::end(); ?>
   
</div>