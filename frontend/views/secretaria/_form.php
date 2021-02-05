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
/* @var $model frontend\models\DatosPersonales */
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
    <?= $form->field($model, 'Apellido')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12">
    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12">
    <?= $form->field($model, 'idUser')->dropDownList($listaUser, ['id' => 'por', 'prompt' => 'Seleccionar Usuario'])->label('Usuario Designado')?>
        </div>
        <div class="col-md-12">
    <?= $form->field($model, 'FechaNac')->widget(DatePicker::className(), [
              'name' => 'datetime_10',
              'readonly' => true,
              'options' => ['placeholder' => 'Elija una fecha ...','value' => date('d-m-Y')],              
              'pluginOptions' => [
                  'format' => 'dd-mm-yyyy',
                  'todayHighlight' => true
              ]
              ])->label('Fecha de Inicio del Cargo') ?> 
        </div>
        <div class="col-md-12">
    <?= $form->field($model, 'DNI')->textInput() ?>
        </div>
        <div class="col-md-12">
    <?= $form->field($model, 'Cuil')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12">
    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12">
    <?= $form->field($model, 'TelFijo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12">
    <?= $form->field($model, 'Celular')->textInput(['maxlength' => true]) ?>
        </div>

    
    </div>
    </div>
    <div class="box-footer">
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Volver',['index'], ['class' => 'btn btn-primary']) ?>
    </div>
    </div>

    <?php ActiveForm::end(); ?>
   
</div>