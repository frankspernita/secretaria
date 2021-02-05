<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cargoayudantes */
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
        <div class="col-md-6">

    <?= $form->field($model, 'idDatosP')->dropDownList($listaPersonas, ['id' => 'por', 'prompt' => 'Seleccionar Ayudante'])->label('Ayudante para el Cargo')?>
        </div>         
        <div class="col-md-6">
    <?= $form->field($model, 'Legajo')->textInput(['maxlength' => true]) ?>
        </div>         
        <div class="col-md-6">
    <?= $form->field($model, 'Carrera')->textInput(['maxlength' => true]) ?>
        </div>         
        <div class="col-md-6">
    <?= $form->field($model, 'idAsignatura')->dropDownList($listaAsignatura, ['id' => 'por', 'prompt' => 'Seleccionar Asignatura'])->label('Asignatura a Cargo')?>
        </div>         
        <div class="col-md-6">
    <?= $form->field($model, 'idResolucion')->dropDownList($listaResolucion, ['id' => 'por', 'prompt' => 'Seleccionar Resolucion'])->label('Resolucion del Cargo')?>
        </div>         
            
        <div class="col-md-6">
    <?= $form->field($model, 'Expediente')->textInput(['maxlength' => true]) ?>
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